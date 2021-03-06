<?php

namespace app\model;


use my_fr\core\Model;
use my_fr\core\my_fr;
use my_fr\core\web\Cookie;
use my_fr\core\web\Session;

class Users extends Model
{
    private $_isLoggedIn, $_sessionName, $_cookieName;
    public static $currentLoggedInUser = null;

    public function __construct($user = '')
    {
        $table = 'users';
        parent::__construct($table);
        $this->_sessionName = CURRENT_USER_SESSION_NAME;
        $this->_cookieName = REMEMBER_ME_COOKIE_NAME;
        $this->_softDelete = true;
        if($user != ''){
            if(is_int($user)){
                $u = $this->_db->findFirst($table, ['conditions' => 'id = ?', 'bind' => [$user]]);
            } else {
                $u = $this->_db->findFirst($table, ['conditions' => 'user_login = ?', 'bind' => [$user]]);
            }
            if($u){
                foreach ($u as $key => $value){
                    $this->$key = $value;
                }
            }
        }
    }

    public function findByUsername($username){
        return $this->findFirst(['conditions' => 'user_login = ?', 'bind' => [$username]]);
    }

    public static function currentLoggedInUser() {
        if(!isset(self::$currentLoggedInUser) && Session::exists(CURRENT_USER_SESSION_NAME)){
            $U = new Users((int)Session::get(CURRENT_USER_SESSION_NAME));
            self::$currentLoggedInUser = $U;
        }
        return self::$currentLoggedInUser;
    }

    public function login($rememberMe = false){
        Session::set($this->_sessionName, $this->id);
        $_SESSION['lvl'] = $this->lvl;
        if($rememberMe){
            $hash = md5(uniqid() + rand(0, 100));
            $user_agent = Session::uagent_no_version();
            Cookie::set($this->_cookieName, $hash, REMEMBER_ME_COOKIE_EXPIRY);
            $fields = ['session' => $hash, 'user_agent' => $user_agent, 'user_id' => $this->id];
            $this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);
            $this->_db->insert('user_sessions', $fields);
        }
    }

    public static function loginUserFromCookie(){
        $user_session_model = new UserSessions();
        $user_session = $user_session_model->findFirst([
            'conditions' => "user_agent = ? AND session = ?",
            'bind' => [Session::uagent_no_version(), Cookie::get(REMEMBER_ME_COOKIE_NAME)]
        ]);
        if($user_session->user_id != ''){
            $user = new self((int)$user_session->user_id);
        }
        $user->login();
        return $user;
    }

    public function logout(){
        $user_agent = Session::uagent_no_version();
        $this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);
        Session::delete(CURRENT_USER_SESSION_NAME);
        if(Cookie::exists(REMEMBER_ME_COOKIE_NAME)){
            Cookie::delete(REMEMBER_ME_COOKIE_NAME, REMEMBER_ME_COOKIE_EXPIRY);
        }
        $_SESSION['lvl'] = 0;
        self::$currentLoggedInUser = null;
        return true;
    }

    public function registerNewUser($params)
    {
        $this->assign($params);
        $this->user_password = password_hash($this->user_password, PASSWORD_DEFAULT);
        $this->lvl = 1;
        $this->save();
        $u = $this->_db->findFirst('users', ['conditions' => 'user_login = ?', 'bind' => [$this->user_login]]);
        $this->id = $u->id;
    }
}
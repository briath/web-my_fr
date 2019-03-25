<?php

namespace app\controller;


use app\model\Users;
use my_fr\core\Controller;
use my_fr\core\Input;
use my_fr\core\Router;
use my_fr\core\Validate;
use my_fr\core\web\Session;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->load_model(Users::class);
    }

    public function loginAction($params = null){
        $valadation = new Validate();
        if($_POST){
            $valadation->check($_POST, [
                'user_login'        => [
                    'display'       => "User_login",
                    'required'      => true,
                ],
                'user_password'     => [
                    'display'       => 'User_password',
                    'required'      => true,
                ],
            ]);
            if($valadation->passed() === true){
                $user = $this->{Users::class.'Model'}->findByUsername($_POST['user_login']);
                if($user && password_verify(Input::get('user_password'), $user->user_password)){
                    $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
                    $user->login($remember);
                    Router::redirect('');
                }
            }
        }
        $this->render('user/login');
    }

    public function registerAction($params = null){
        $this->render('user/index');
    }

}
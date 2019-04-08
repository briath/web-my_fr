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
        parent::__construct();
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
                    'min'           => 6,
                ],
            ]);
            if($valadation->passed() === true){
                $user = $this->{Users::class.'Model'}->findByUsername($_POST['user_login']);
                if($user && password_verify(Input::get('user_password'), $user->user_password)){
                    $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
                    $user->login($remember);
                    Router::redirect('');
                } else {
                    $valadation->addError("There is an error with your username or password.");
                }
            }
        }
        $this->view->displayErrors = $valadation->displayErrors();
        $this->render('user/login');
    }

    public function logoutAction(){
        if(Users::currentLoggedInUser()){
            Users::currentLoggedInUser()->logout();
        }
        Router::redirect('');
    }

    public function registerAction($params = null){
        $valadation = new Validate();
        $posted_values = ['user_login'=>'', 'email'=>'', 'user_password'=>'', 'confirm'=>''];
        if($_POST){
            $posted_values = $this->posted_values($_POST);
            $valadation->check($_POST, [
                'user_login'=> [
                    'display'       => 'User_login',
                    'required'      => true,
                    'unique'        => 'users',
                    'min'           => 3,
                    'max'           => 150,
                ],
                'email'=>[
                    'display'       => 'Email',
                    'required'      => true,
                    'unique'        => 'users',
                    'max'           => 150,
                    'valid_email'   => true,
                    ],
                'user_password'=> [
                    'display'       => 'User_password',
                    'required'      => true,
                    'min'           => 6,
                ],
                'confirm'=> [
                    'display'       => 'Confirm Password',
                    'required'      => true,
                    'matches'       =>'user_password'
                ]
            ]);
            if($valadation->passed()){
                $newUser = new Users();
                $newUser->registerNewUser($_POST);
                $newUser->login();
                Router::redirect('');
            }
        }

        $this->view->post = $posted_values;
        $this->view->displayErrors = $valadation->displayErrors();
        $this->render('user/register');
    }

}
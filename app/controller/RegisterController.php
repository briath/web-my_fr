<?php

namespace app\controller;


use app\model\Users;
use my_fr\core\Controller;
use my_fr\core\web\Session;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->load_model(Users::class);
    }

    public function loginAction($params = null){
        if($_POST){
            $valadation = true;
            if($valadation === true){
                $user = $this->{Users::class.'Model'}->findByUsername($_POST['user_login']);
                echo '<pre>';
                print_r($user);
                die();
            }
        }
        $this->render('user/login');
    }

    public function registerAction($params = null){
        $this->render('user/index');
    }

}
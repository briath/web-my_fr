<?php

namespace app\controller;


use my_fr\core\Controller;
use my_fr\core\web\Session;

class RegisterController extends Controller
{

    public function loginAction($params = null){
        $this->render('user/login');
    }

    public function registerAction($params = null){
        $this->render('user/index');
    }

}
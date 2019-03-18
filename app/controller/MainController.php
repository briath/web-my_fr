<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 06.03.19
 * Time: 16:02
 */
//[
//            'conditions' => "user_password = ?",
//            'bind' => ['0110'],
//            'order' => "user_login, user_password",
//            'limit' => 2
//        ]
namespace app\controller;

use app\view\ViewRegistration;
use my_fr\core\Controller;
use my_fr\core\DB;

class MainController extends Controller
{
    public function indexAction($params = null){
        $db = DB::getInstance();
        echo '<pre>';
        print_r($db->findFirst('users', [
            'conditions' => "user_password = ?",
            'bind' => ['0110']
        ]));

        $this->render('user/View.Registration');
    }

}
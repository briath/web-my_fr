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
        $this->render('main/index');
    }

    public function guidesAction($params = null){
        $this->render('main/guides');
    }

    public function videosAction($params = null){
        $this->render('main/videos');
    }

    public function graphsAction($params = null){
        $this->render('main/graphs');
    }
}
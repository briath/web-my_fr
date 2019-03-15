<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 06.03.19
 * Time: 16:02
 */

namespace app\controller;

use app\view\ViewRegistration;
use my_fr\core\Controller;

class MainController extends Controller
{
    public function indexAction($params = null){
        $this->render('user/View.Registration');
    }

}
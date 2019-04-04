<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 04.04.19
 * Time: 15:56
 */

namespace app\controller;


use my_fr\core\Controller;

class ContentsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load_model(Users::class);
    }

    public function guidesAction($params = null){
        $this->render('main/guides');
    }
}
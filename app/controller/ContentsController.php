<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 04.04.19
 * Time: 15:56
 */

namespace app\controller;


use app\model\Contents;
use http\Params;
use my_fr\core\Controller;
use my_fr\core\Router;
use my_fr\core\Validate;

class ContentsController extends Controller
{
    private $number_page;

    public function __construct()
    {
        parent::__construct();
    }

    public function guidesAction($params = 1){
        $this->number_page = (is_array($params) and !empty($params)) ? $params[0] : 1;
        $content = new Contents('guides', $this->number_page);


        $this->view->codeContent = $content->view_content();
        $this->view->codeContent .= $content->pagination();
        $this->render('main/guides');
    }

    public function showAction($params){
        $id = substr($params[1], 3);
        $content = new Contents('guides',1, $id);
        $this->view->codeContent = $content->showContent();
        $this->render($params[0] . '/index');
    }

    public function addAction($params = null){
        $valadation = new Validate();
        $posted_values = ['name_content'=>'', 'description'=>'', 'url'=>''];
        if($_POST){
            $posted_values = $this->posted_values($_POST);
            $valadation->check($_POST, [
                'name_content'=> [
                    'display'       => 'Name_content',
                    'required'      => true,
                    'unique'        => 'contents',
                    'max'           => 150,
                ],
            ]);
            if($valadation->passed()) {
                $content = new Contents('guides', 1);
                $content->add_content($_POST);
                Router::redirect('contents/guides');
            }
        }

        $this->view->post = $posted_values;
        $this->view->displayErrors = $valadation->displayErrors();
        $this->render('content/add', $params);
    }
}
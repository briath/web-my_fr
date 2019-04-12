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

    public function videosAction($params = 1){
        $this->number_page = (is_array($params) and !empty($params)) ? $params[0] : 1;
        $content = new Contents('videos', $this->number_page);


        $this->view->codeContent = $content->view_content();
        $this->view->codeContent .= $content->pagination();
        $this->render('main/videos');
    }

    public function showAction($params){
        $id = substr($params[1], 3);
        $content = new Contents($params[0],1, $id);
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

                'url'=>[
                    'display'       => 'Add ' . $params[0],
                    'required'      => true,
                    'valid_url'     => true,
                ],
            ]);
            if($valadation->passed()) {
                $content = new Contents($params[0], 1);
                $content->add_content($_POST);
                Router::redirect('contents/'.$params[0]);
            }
        }

        $this->view->post = $posted_values;
        $this->view->displayErrors = $valadation->displayErrors();
        if($params[0] === 'guides') {
            $attr = array('guide');
        } elseif ($params[0] === 'videos'){
            $attr = array('video');
        } elseif ($params[0] === 'graphs'){
            $attr = array('graphs');
        }
        $this->render('content/add', $attr);
    }

    public function removeAction($params = null){
        $id = substr($params[1], 3);
        $content = new Contents($params[0],1, $id);
        $content->remove($id);
        Router::redirect('contents/'.$params[0]);
    }

    public function editAction($params = null){
        $id = substr($params[1], 3);
        $valadation = new Validate();
        $content = new Contents($params[0],1, $id);
        $posted_values = ['name_content'=>'', 'description'=>'', 'url'=>''];
        if($_POST){
            $posted_values = $this->posted_values($_POST);
            $valadation->check($_POST, [
                'name_content'=> [
                    'display'       => 'Name_content',
                    'required'      => true,
                    'max'           => 150,
                ],
            ]);
            if($valadation->passed()) {
                $content->edit($_POST);
                Router::redirect('contents/show/'.$params[0].'/id='.$id);
            }
        }

        $this->view->displayErrors = $valadation->displayErrors();
        if($params[0] === 'guides') {
            $attr = array('guide', $content->name_content, $content->description, $content->url);
        } elseif ($params[0] === 'videos'){
            $attr = array('video', $content->name_content, $content->description, $content->url);
        } elseif ($params[0] === 'graphs'){
            $attr = array('graphs', $content->name_content, $content->description, $content->url);
        }
        $this->render('content/edit', $attr);
    }
}
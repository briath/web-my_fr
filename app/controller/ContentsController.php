<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 04.04.19
 * Time: 15:56
 */

namespace app\controller;


use app\model\Contents;
use my_fr\core\Controller;
use my_fr\core\Router;
use my_fr\core\Validate;

class ContentsController extends Controller
{
    private $_count_rows, $number_page;

    public function __construct()
    {
        parent::__construct();
        $this->load_model(Users::class);
    }

    public function guidesAction($params = 1){
        $this->number_page = $params;
        $content = new Contents('guides');
        $content->view_content($params);
        $this->view->code = '<div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="../../../web/docs/image/image1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Название карточки</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                                <a href="#" class="btn btn-primary">Переход куда-нибудь</a>
                            </div>
                        </div>
                    </div>';
        $this->render('main/guides');
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
                $content = new Contents('guides');
                $content->add_content($_POST);
                Router::redirect('main/guides');
            }
        }

        $this->view->post = $posted_values;
        $this->view->displayErrors = $valadation->displayErrors();
        $this->render('content/add', $params);
    }
}
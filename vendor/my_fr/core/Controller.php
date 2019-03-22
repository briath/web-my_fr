<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 06.03.19
 * Time: 15:30
 */
namespace my_fr\core;

class Controller
{

    protected $_params = array();

    public function __construct()
    {
    }

    public function render($viewName, $attributes = null){
        (new View())->getView(isset($this->layout) ? $this->layout : null)->render($this->getClassFromPath(), $viewName, $attributes);
    }


    public function getClassFromPath(){
        $arr = explode('/', __DIR__);

        array_splice($arr, 4);

        return  implode('/', $arr) . '/app/view/';
    }

    protected function load_model($model){
        if(class_exists($model)){
            $this->{$model.'Model'} = new $model(strtolower($model));
        }
    }
}
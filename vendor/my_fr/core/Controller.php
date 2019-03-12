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

    public function render($view, $attributes = null){
        View::getView(isset($this->layout) ? $this->layout : null)->render($this->getClassFromPath(), $view, $attributes);
    }
}
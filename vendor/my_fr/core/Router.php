<?php

namespace my_fr\core;


class Router
{
    private $_controller_ways = array();
    private $_uri = array();
    private $_method = array();

    public function __construct()
    {
    }

    public function add($uri, $method = null){
        $this->_uri[] = '/' . trim($uri, '/');

        if($method != null){
            $this->_method[] = $method;
        }
    }

    public function addController_ways($name, $ways){
        $this->_controller_ways[$name] = $ways;
    }

    public function submit(){
        //echo '<pre>';
        //print_r($this->_uri);
        //print_r($this->_method);


        //controller
        $url = isset($_SERVER['REQUEST_URI']) ? explode('/', ltrim($_SERVER['REQUEST_URI'], '/')) : [];
        $controller_name = ((isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : 'Main');
        array_shift($url);

        //action
        $action_name = (isset($url[0]) && $url[0] != '') ? $url[0] . 'Action' : 'indexAction';
        array_shift($url);
        //echo $controller_name . '<br/>';
        //echo $action_name . '<br/>';
        //print_r($url);

        //params
        $queryParams = $url;

        //echo $this->_uri[$controller_name];;

        $controller = new $this->_controller_ways[$controller_name];

        if(method_exists($controller, $action_name)){
            call_user_func_array([$controller, $action_name], $queryParams);
        } else {
            die('This method doesn\'t exist (\"' . $action_name . '\"');
        }
    }

    public static function redirect($location){
        $location = 'http://' . $_SERVER['SERVER_NAME'] . '/' . $location;
        if(!headers_sent()){
            header('Location: '.$location);
            exit();
        } else {
            echo '<script type="text/javascript"';
            echo 'window.location.href="'.$location.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$location.'" />';
            echo '</noscript>';
            exit;
        }
    }

}


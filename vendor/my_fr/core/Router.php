<?php

namespace my_fr\core;

class Router
{

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

    public function submit(){
        echo '<pre>';
        //print_r($this->_uri);
        //print_r($this->_method);

        $url = explode('/', $_GET['uri']);

        $uriGetParam = isset($_GET['uri']) ? '/' . $url[0] : '/';
        array_shift($url);
        foreach ($this->_uri as $key => $value) {
            if (preg_match("#^$value$#", $uriGetParam)) {
                $controller_name = $this->_method[$key][0];
                $action_name = $this->_method[$key][1];
                $queryParams = $url;

                $con = new $controller_name($queryParams);
                $con->$action_name();
            }
        }
    }

}


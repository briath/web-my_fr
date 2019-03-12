<?php

namespace my_fr\core\web;


class Session
{
    static public function start(){
        session_name('my_fr');
        session_start();
        if(isset($_SESSION['name']) && !empty($_SESSION['name']['login'])){
            //My_fr::$isGouest = false;
        }
    }

    static public function stop(){
        session_destroy();
    }

    static public function set($arr){
        if(is_array($arr)){
            foreach ($arr as $key => $value){
                $_SESSION[$key] = $value;
            }
            return;
        }
    }

    static public function delete($var){
        if(isset($_SESSION[$var])){
            unset($_SESSION[$var]);
        }
        return;
    }
}
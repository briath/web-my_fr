<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 25.03.19
 * Time: 14:39
 */

namespace my_fr\core;


class Input
{
    public static function sanitize($dirty){
        return htmlentities($dirty, ENT_QUOTES, "UTF-8");
    }

    public static function get($input){
        if(isset($_POST[$input])){
            return self::sanitize($_POST[$input]);
        } elseif (isset($_GET[$input])) {
            return self::sanitize($_GET[$input]);
        }
    }
}
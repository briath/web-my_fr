<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 20.03.19
 * Time: 15:48
 */

namespace my_fr\core\web;


class Cookie
{
    public static function set($name, $value, $expiry){
        if(setCookie($name, $value, time() + $expiry, '/')){
            return true;
        }
        return false;
    }

    public static function delete($name, $expiry = 0){
        self::set($name, '', time()-1);
    }

    public static function get($name){
        return $_COOKIE[$name];
    }

    public static function exists($name){
        return isset($_COOKIE[$name]);
    }
}
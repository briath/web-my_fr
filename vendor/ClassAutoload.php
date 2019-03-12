<?php


class ClassAutoload
{
    private static $loader;

    public static function loadLoader($class){
        if ('my_fr\core\Loader' === $class) {
            require 'my_fr/core/Loader.php';
        }
    }

    public static function getLoader(){
        if(self::$loader != null){
            return self::$loader;
        }

        spl_autoload_register(['ClassAutoload', 'loadLoader']);
        self::$loader = new my_fr\core\Loader();
        spl_autoload_unregister(['ClassAutoload', 'loadLoader']);

        spl_autoload_register([self::$loader, 'loadClass']);

        return self::$loader;
    }
}
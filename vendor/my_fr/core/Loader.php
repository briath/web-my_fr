<?php
namespace my_fr\core;



class Loader
{
    public function loadClass($class){
        $arr = explode('\\', $class);
        $prefix = array_shift($arr);


        if($prefix == 'app'){
            $prefix_file =  realpath(__DIR__ . '/../../../app') . '/';
        } elseif ($prefix == 'my_fr') {
            $prefix_file = '../vendor/my_fr/';
        }

        $file = $prefix_file . implode('/', $arr) . '.php';


        if(is_file($file)){
            include $file;
        }
    }
}
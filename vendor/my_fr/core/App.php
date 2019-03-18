<?php


namespace my_fr\core;



use app\controller\ArticleController;
use my_fr\core\web\Session;
use app\controller\MainController;
use app\controller\UserController;



class App
{

    public static $controller_ways = [
        'Main'       => MainController::class,
        'User'       => UserController::class,
        'Article'    => ArticleController::class,
    ];

    public static $ways = [
        ''                  => [MainController::class, 'indexAction'],
        '/'                 => [MainController::class, 'indexAction'],
        '/error'            => [MainController::class, 'errorAction'],
        '/guides'           => [MainController::class, 'guideAction'],
        '/videos'           => [MainController::class, 'videoAction'],
        '/graphs'           => [MainController::class, 'graphAction'],

        '/registration'     => [UserController::class, 'registrationAction'],
        '/login'            => [UserController::class, 'loginAction'],

        '/articles'         => [ArticleController::class, 'show_articleAction'],
    ];

    static public function start(){
        try{
            Session::start();

        }catch (\Exception $e){

        }

        $router = new Router();

        $router->add('/index.php', [MainController::class, 'indexAction']);
        foreach (self::$ways as $key => $value){
            $router->add($key, $value);
        }
        foreach (self::$controller_ways as $key => $value){
            $router->addController_ways($key, $value);
        }

        $router->submit();
    }
}
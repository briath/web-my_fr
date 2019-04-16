<?php


namespace my_fr\core;



use app\controller\ArticleController;
use app\controller\ContentsController;
use app\controller\RegisterController;
use app\model\Users;
use my_fr\core\web\Cookie;
use my_fr\core\web\Session;
use app\controller\MainController;
use app\controller\UserController;



class App
{

    public static $controller_ways = [
        'Main'       => MainController::class,
        'User'       => UserController::class,
        'Article'    => ArticleController::class,
        'Register'   => RegisterController::class,
        'Contents'   => ContentsController::class,
    ];

    static public function start(){
        try{
            Session::start();
        }catch (\Exception $e){

        }


        if(!Session::exists(CURRENT_USER_SESSION_NAME) && Cookie::exists(REMEMBER_ME_COOKIE_NAME)) {
            Users::loginUserFromCookie();
        }

        $router = new Router();


        foreach (self::$controller_ways as $key => $value){
            $router->addController_ways($key, $value);
        }

        $router->submit();
    }
}
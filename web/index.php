<?php

require_once "../vendor/autoload.php";

my_fr\core\App::start();







//if(isset($_GET['submitLogIN'])){
//    //header('Location:index.php');
//}
//
//if(isset($_GET['submitRegister'])){
//    header("Location:view/View.Registration.php");
//}
//
//
//
//if(isset($_POST['login']) & isset($_POST['password'])){
//    //ОБРАЩЕНИЕ К БД
//    if($_POST['login'] == 'Nartu' & $_POST['password'] == '0110'){
//        $_SESSION['name'] = $_POST['login'];
//        echo $_POST['name'];
//    }
//}
//
//if(!isset($_SESSION['name'])) {
//    require 'view/View.Index.php';
//}


/*if(!empty($_POST))
{
    foreach ($_POST as $key => $value)
        echo $key . ' => ' . $value . '<br/>';
    if($_POST['submitRegister'] == 'Register') {
        //echo '<a href=view/View.Registration.php'> '
        //header("Location:view/View.Registration.php");
        //include_once 'view/View.Registration.php';
        exit();
    }
}










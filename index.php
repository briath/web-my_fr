<?php

define('ROOT', __DIR__ . 'index.php/');
define('SNAME', $_SERVER['SERVER_NAME']);
define('DROOT', $_SERVER['DOCUMENT_ROOT']);
include DROOT . '/app/config/config.php';

require_once "vendor/autoload.php";



//ini_set('display_errors', 1);
//error_reporting(-1);
$db = my_fr\core\DB::getInstance();

my_fr\core\App::start();



<?php

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define('BASEPATH', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
//require(ROOT . 'Config/core.php');
//
//require(ROOT . 'router.php');
//require(ROOT . 'request.php');
//require(ROOT . 'dispatcher.php');
require BASEPATH . '/vendor/autoload.php';
use MVC\Dispatcher;
$dispatch = new Dispatcher();
$dispatch->dispatch();
?>
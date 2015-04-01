<?php
//Handles autoloading of classes
require_once('App/Helper/Autoloader.php');

use App\Controller\ControllerFactory;
use App\Model\Service\ServiceFactory;
use App\Core\Router;
use App\Core\Request;

//Start Session
session_start();

//Route URL
$uri 	= array_key_exists('uri', $_GET) ? $_GET['uri'] : '';
$router = new Router(new ControllerFactory);
$router->route(new Request($uri));

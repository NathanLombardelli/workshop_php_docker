<?php


require_once 'Controllers/IndexController.php';
$controller = new IndexController();

require_once 'Controllers/AuthController.php';
$Auth = new AuthController();

require_once 'Controllers/Router.php';
$router = new Router($controller,$Auth);
$router->start();

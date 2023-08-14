<?php

require 'vendor/autoload.php';



use Controllers\IndexController;
use Controllers\AuthController;
use Controllers\Router;

$controller = new IndexController();
$Auth = new AuthController();
$router = new Router($controller,$Auth);
$router->start();

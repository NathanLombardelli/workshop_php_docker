<?php


require_once 'Controllers/IndexController.php';
$controller = new IndexController();


require_once 'Controllers/AuthController.php';
$Auth = new AuthController();


try {

    $urlPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");

    if ($urlPath === "") {
        $controller->index();
    }

    if ($urlPath === "product") {
        $controller->product();
    }

    if ($urlPath === "logout") {
        $Auth->logout();
    }

    if ($urlPath === "register") {
        $Auth->register();
    }

    if ($urlPath === "login") {
        $Auth->login();
    }

}catch (Exception $e){
    echo $e;
}


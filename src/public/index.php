<?php


require_once 'Controllers/IndexController.php';
$controller = new IndexController();



require_once 'Controllers/AuthController.php';
$Auth = new AuthController();


try {

    $urlPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");

    if ($urlPath === "") {
        $controller->index();
    }else if ($urlPath === "product") {
        $controller->product();
    }else if ($urlPath === "logout") {
        $Auth->logout();
    }else if ($urlPath === "register") {
        $Auth->register();
    }else if ($urlPath === "login") {
        $Auth->login();
    }else{
        $controller->page404("Page Introuvable");
    }

}catch (Exception $e){
    $controller->page404($e);
}


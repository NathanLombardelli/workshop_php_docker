<?php

class Router
{
    private $controller;
    private $Auth;

    public function __construct($controller,$Auth){

        $this->controller = $controller;
        $this->Auth = $Auth;

    }

    public function start(){
        try {

            $urlPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");

            if ($urlPath === "") {
                $this->controller->index();
            }else if ($urlPath === "product") {
                $this->controller->product();
            }else if ($urlPath === "logout") {
                $this->Auth->logout();
            }else if ($urlPath === "register") {
                $this->Auth->register();
            }else if ($urlPath === "login") {
                $this->Auth->login();
            }else{
                $this->controller->errorPage("Page Introuvable","404");
            }

        }catch (Exception $e){
            $this->controller->errorPage($e,"500");
        }
    }


}
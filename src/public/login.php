<?php

use Controllers\AuthController;
require_once 'public/Controllers/AuthController.php';

session_start();

if (empty($_POST)) {

    include 'public/views/layout/header.view.php';
    include 'public/views/login.view.php';
    include 'public/views/layout/footer.view.php';

}else{
    // si formaire déjà soumis

    $Auth = new AuthController();
    $Auth->login();

}
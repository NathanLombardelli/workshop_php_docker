<?php

use Controllers\AuthController;
require_once 'public/Controllers/AuthController.php';

$Auth = new AuthController();
$Auth->login();


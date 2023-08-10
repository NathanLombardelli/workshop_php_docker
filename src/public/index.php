<?php

use Controllers\IndexController;
require_once 'public/Controllers/IndexController.php';

$controller = new IndexController();
$controller->index();
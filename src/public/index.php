<?php
declare(strict_types=1);

session_start();

try {

    require_once 'public/db/Database.php';

    $db = new Database();

    $products = $db->fetchAll("SELECT * FROM products LIMIT 20");

    include 'public/views/layout/header.view.php';
    include 'public/views/index.view.php';
    include 'public/views/layout/footer.view.php';

}catch (Exception $e){
    print_r($e->getMessage());
}
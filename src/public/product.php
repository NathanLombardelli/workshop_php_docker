<?php

session_start();

require_once 'public/db/Database.php';

$db = new Database();

    try {

        require_once 'public/db/connection.php';

        $product = $db->prepare("SELECT * FROM products WHERE productCode = ?",[$_GET['id']]);

        //includes
        include 'public/views/layout/header.view.php';
        include 'public/views/product.view.php';
        include 'public/views/layout/footer.view.php';

    }catch (Exception $e){
        print_r($e->getMessage());
    }


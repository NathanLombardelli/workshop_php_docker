<?php

session_start();


    try {

        require_once 'public/db/connection.php';

        $stmt = $pdo->query("SELECT * FROM products WHERE productCode = '". $_GET['id'] . "'");
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        //includes
        include 'public/views/layout/header.view.php';
        include 'public/views/product.view.php';
        include 'public/views/layout/footer.view.php';

    }catch (Exception $e){
        print_r($e->getMessage());
    }


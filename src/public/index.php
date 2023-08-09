<?php
declare(strict_types=1);

try {

    $pdo = new PDO('mysql:host=' . getenv('DB_HOST') . ';dbname='. getenv('DB_DATABASE')  ,
        getenv('DB_USERNAME'),
        getenv('DB_PASSWORD')
    );

    $sql = "SELECT * FROM products LIMIT 20";

    $stmt = $pdo->query($sql);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    include 'public/views/layout/header.view.php';
    include 'public/views/index.view.php';
    include 'public/views/layout/footer.view.php';

}catch (Exception $e){
    print_r($e->getMessage());
}
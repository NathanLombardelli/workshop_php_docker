<?php

require_once 'db/Database.php';

class IndexController
{

    private $db;

    public function __construct(){
        $this->db = new Database();
        session_start();
    }

    public function index(){

        try {

            $products = $this->db->fetchAll("SELECT * FROM products LIMIT 20");

            include 'views/layout/header.view.php';
            include 'views/index.view.php';
            include 'views/layout/footer.view.php';

        }catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function product(){

        try {

            $product = $this->db->prepare("SELECT * FROM products WHERE productCode = ?",[$_GET['id']]);

            //includes
            include 'views/layout/header.view.php';
            include 'views/product.view.php';
            include 'views/layout/footer.view.php';

        }catch (Exception $e){
            throw new Exception($e->getMessage());
        }

    }


    public function errorPage($e, $errorCode){

        include 'views/layout/header.view.php';
        include 'views/layout/errorPage.view.php';
        include 'views/layout/footer.view.php';


    }

}
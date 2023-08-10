<?php

namespace Controllers;

use Database;
use Exception;

require_once 'public/db/Database.php';

class IndexController
{

    //ToDo: changer post par var methode.

    private $db;

    public function __construct(){
        $this->db = new Database();
        session_start();
    }

    public function index(){

        try {

            $products = $this->db->fetchAll("SELECT * FROM products LIMIT 20");

            include 'public/views/layout/header.view.php';
            include 'public/views/index.view.php';
            include 'public/views/layout/footer.view.php';

        }catch (Exception $e){
            print_r($e->getMessage());
        }
    }

    public function product(){

        try {

            require_once 'public/db/connection.php';

            $product = $this->db->prepare("SELECT * FROM products WHERE productCode = ?",[$_GET['id']]);

            //includes
            include 'public/views/layout/header.view.php';
            include 'public/views/product.view.php';
            include 'public/views/layout/footer.view.php';

        }catch (Exception $e){
            print_r($e->getMessage());
        }

    }

}
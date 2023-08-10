<?php

use Controllers\AuthController;
require_once 'public/Controllers/AuthController.php';

session_start();

if (empty($_POST)) {

    include 'public/views/layout/header.view.php';
    include 'public/views/register.view.php';
    include 'public/views/layout/footer.view.php';

}else{
    // si formaire déjà soumis

    $Auth = new AuthController();
    $Auth->register();

//    try{
//
//        require_once 'public/db/Database.php';
//
//        $db = new Database();
//
//        if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) ){
//            throw new Exception('Formulaire non complet');
//        }
//
//        //$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
//        $username = htmlspecialchars($_POST['username']);
//        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
//        $passwordHash = password_hash($_POST['password'],PASSWORD_DEFAULT);
//
//        $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)",[$username,$email,$passwordHash]);
//
//        $_SESSION['user'] = [
//            'id' => $db->lastInsertId(),
//            'username' => $username,
//            'email' => $email
//        ];
//
//        header('location: index.php');
//
//
//    }catch (Exception $e){
//        header('location: register.php?m=erreur%20dans%20la%20création%20du%20compte&color=red');
//    }


}
<?php

session_start();

if (empty($_POST)) {



    include 'public/views/layout/header.view.php';
    include 'public/views/register.view.php';
    include 'public/views/layout/footer.view.php';

}else{
    // si formaire déjà soumis

    try{

        require_once 'public/db/connection.php';

        if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) ){
            throw new Exception('Formulaire non complet');
        }

        //$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $username = htmlspecialchars($_POST['username']);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $passwordHash = password_hash($_POST['password'],PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$passwordHash);

        $stmt->execute();

        $_SESSION['user'] = [
            'id' => $pdo->lastInsertId(),
            'username' => $username,
            'email' => $email
        ];

        header('location: index.php');


    }catch (Exception $e){

    }


}
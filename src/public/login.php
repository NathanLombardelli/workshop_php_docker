<?php

session_start();

if (empty($_POST)) {



    include 'public/views/layout/header.view.php';
    include 'public/views/login.view.php';
    include 'public/views/layout/footer.view.php';

}else{
    // si formaire déjà soumis

    try{

        require_once 'public/db/connection.php';

        if(empty($_POST['username']) || empty($_POST['password']) ){
            throw new Exception('Formulaire non complet');
        }

        $username = htmlspecialchars($_POST['username']);
        $passwordHash = password_hash($_POST['password'],PASSWORD_DEFAULT);


        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

       if(password_verify($_POST['password'], $user['password'])){

           $_SESSION['user'] = [
               'id' => $user['id'],
               'username' => $user['username'],
               'email' => $user['email']
           ];

                   header('location: index.php');

       }else {
           // Gérer le cas où l'utilisateur n'est pas trouvé ou l'authentification échoue
           header('location: login.php?m=le%20compte%20n%27existe%20pas&color=red');
       }


    }catch (Exception $e){
        throw new Exception($e->getMessage());
    }


}
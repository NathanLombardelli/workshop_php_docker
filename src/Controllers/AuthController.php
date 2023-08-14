<?php

namespace Controllers;

use Exception;
use models\Database;

class AuthController
{

    private $db;

    public function __construct(){
        $this->db = new Database();
        session_start();
    }

    public function register(){

        if (empty($_POST)) {

            include 'views/layout/header.view.php';
            include 'views/register.view.php';
            include 'views/layout/footer.view.php';

        }else {

            try {

                if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
                    throw new Exception('Formulaire non complet');
                }

                //$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                $username = htmlspecialchars($_POST['username']);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $this->db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)", [$username, $email, $passwordHash]);

                $_SESSION['user'] = [
                    'id' => $this->db->lastInsertId(),
                    'username' => $username,
                    'email' => $email
                ];

                header('location: /');


            } catch (Exception $e) {
                header('location: register?m=erreur%20dans%20la%20création%20du%20compte&color=red');
            }


        }

    }

    public function login(){

        if (empty($_POST)) {

            include 'views/layout/header.view.php';
            include 'views/login.view.php';
            include 'views/layout/footer.view.php';

        }else {

            try {

                if (empty($_POST['username']) || empty($_POST['password'])) {
                    throw new Exception('Formulaire non complet');
                }

                $username = htmlspecialchars($_POST['username']);

                $user = $this->db->prepare("SELECT * FROM users WHERE username = ?", [$username]);


                if (password_verify($_POST['password'], $user['password'])) {

                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'email' => $user['email'],
                    ];

                    header('location: /');

                } else {
                    // Gérer le cas où l'utilisateur n'est pas trouvé ou l'authentification échoue
                    header('location: login?m=le%20compte%20n%27existe%20pas&color=red');
                }


            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

    }

    public function logout(){
        session_destroy();
        header('Location: /');
    }

}
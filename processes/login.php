<?php
$ROOT = '../';
session_start();
require_once('../classes/User.php');
require_once('../config/Config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user'])) {
        header('Location: ../');
    } else {
        // $_SESSION['AUTH'] = 1;

        $conf = new Config();
        $db = $conf->dbConnect();

        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $query = "SELECT * FROM user WHERE email=:email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
        $result = $stmt->fetch();
        if($result){
            if(password_verify($password, $result->getPassword())){
                $_SESSION['user'] = $result;
                header('Location: ../');
            }else{
                $_SESSION['errPass'] = "Le mot de passe est incorrect";
                header('Location: ../connexion.php');
            
            }
        }else{
            $_SESSION['errId'] = "L'email est incorrect ou n'existe pas !";
            header('Location: ../connexion.php');
           
        }
        // $_SESSION['user'] = $user;
    }
    
}

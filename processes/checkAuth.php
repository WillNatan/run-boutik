<?php
include_once($ROOT.'classes/User.php');
session_start();
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    if(!$user->hasRole('ROLE_ADMIN')){
        header('Location: '.$ROOT);
    }
}else{
    header('Location: '.$ROOT.'connexion.php');
}
?>
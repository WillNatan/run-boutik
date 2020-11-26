<?php 
session_start();
$_SESSION['test'] = 'test';
header('Location: ./nouvelle-adresse.php');
?>
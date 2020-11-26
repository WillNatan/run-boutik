<?php 
include_once($ROOT.'processes/checkAuth.php');
include_once($ROOT.'config/Config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo $ROOT;?>css/dashboard.css" />
    <link rel="stylesheet" href="<?php echo $ROOT;?>css/main.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="icon" href="<?php echo $ROOT ?>img/logo.png">
</head>

<body>
    <nav class="dash-nav">
        <div class="dash-logo">
            <a href="<?php echo $ROOT ?>" target="_blank">
                <div class="logo-bg">
                    <img src="<?php echo $ROOT;?>img/logo.png" class="img-fluid" alt="" />
                </div>
            </a>
        </div>
        <div class="divider"></div>
        <ul class="tree">
            <li>
                <a href="<?php echo $ROOT; ?>admin/">
                    <i class="fa fa-tachometer-alt" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo $ROOT; ?>admin/boutique">
                    <i class="fa fa-store-alt" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo $ROOT; ?>admin/produits">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo $ROOT; ?>admin/adresses">
                    <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                </a>
            </li>
        </ul>
    </nav>
    <header>
        <ul class="header-nav ml-auto">
            <li>
                <a href=""><i class="fa fa-search" aria-hidden="true"></i></a>
            </li>
            <li>
                <a href="<?php echo $ROOT.'processes/logout.php'?>"><i class="fas fa-door-open"></i></a>
            </li>
        </ul>
    </header>

    <div class="wrapper">
        <div class="content">
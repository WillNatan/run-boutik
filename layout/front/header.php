<?php
$ROOT = './';
require_once('classes/User.php');
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}


?>
<!doctype html>
<html lang="en">

<head>
    <title>Run Boutik</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo $ROOT ?>css/frontend.css">
    <link rel="stylesheet" href="<?php echo $ROOT ?>css/animate.css" />
    <link rel="stylesheet" href="<?php echo $ROOT ?>css/main.css" />
    <link rel="icon" href="<?php echo $ROOT ?>img/logo.png">
</head>
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="#"><img src="img/logo.png" id="navbar-logo" width="80" alt="Brand"></a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $ROOT; ?>"><i class="fa fa-home"></i> Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $ROOT; ?>recherche.php"><i class="fa fa-search"></i> Rechercher</a>
                </li>
                <?php if (isset($user) && $user->hasRole('ROLE_ADMIN')) { ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo $ROOT; ?>admin"><i class="fa fa-star"></i> Administration</a>
                    </li>
                <?php } ?>
                <?php if (!isset($user)) { ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo $ROOT; ?>connexion.php"><i class="fa fa-user"></i> Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo $ROOT; ?>inscription.php"><i class="fa fa-user-plus"></i> Inscription</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo $ROOT; ?>processes/logout.php"><i class="fa fa-door-open"></i> Déconnexion</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<?php
session_start();
if (isset($_SESSION['user'])) {
  header('Location: ./');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Connexion</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/signin.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/main.css" />
</head>

<body class="text-center">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <form class="form-signin text-center h-100" action="processes/register.php" method="POST">
          <div class="form-icon">
            <img src="img/logo.png" class="img-fluid" alt="Logo" />
          </div>
          <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nom" class="sr-only">Nom</label>
                <input name="nom" type="text" id="nom" class="form-control" placeholder="Nom" required autofocus />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="prenom" class="sr-only">Prénom</label>
                <input name="prenom" type="text" id="prenom" class="form-control" placeholder="Prénom" required />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="username" class="sr-only">Nom d'utilisateur</label>
                <input name="username" type="text" id="username" class="form-control" placeholder="Nom d'utilisateur" required />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="inputEmail" class="sr-only">Adresse email</label>
                <?php if (isset($_SESSION['emailExist'])) { ?>
                  <span class="text-danger"><?php echo $_SESSION['emailExist'] ?></span>
                <?php }
                unset($_SESSION['emailExist']); ?>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Adresse email" required />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="inputPassword" class="sr-only">Mot de passe</label>
                <?php if (isset($_SESSION['passMatch'])) { ?>
                  <span class="text-danger"><?php echo $_SESSION['passMatch'] ?></span>
                <?php }
                unset($_SESSION['passMatch']); ?>
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="inputPassword" class="sr-only">Retaper le mot de passe</label>
                <input name="password_repeat" type="password" id="inputPassword" class="form-control" placeholder="Retaper le mot de passe" required />
              </div>
            </div>
          </div>
          <button class="btn-runb-primary btn-block" type="submit">
            Créer mon compte
          </button>
        </form>
      </div>
      <div class="col-md-6 mt-2 mt-md-0">
        <form class="form-signin text-center business" action="processes/register-business.php" method="POST">
          <div class="form-icon">
            <img src="img/logo.png" class="img-fluid" alt="Logo" />
          </div>
          <h1 class="h3 mb-3 font-weight-normal">Vous avez une boutique ?</h1>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nom" class="sr-only">Nom</label>
                <input name="nom" type="text" id="nom" class="form-control" placeholder="Nom" required autofocus />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="prenom" class="sr-only">Prénom</label>
                <input name="prenom" type="text" id="prenom" class="form-control" placeholder="Prénom" required />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="shopname" class="sr-only">Nom de votre boutique</label>
                <input name="shopname" type="text" id="shopname" class="form-control" placeholder="Nom de votre boutique" required />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="username" class="sr-only">Nom d'utilisateur</label>
                <input name="username" type="text" id="username" class="form-control" placeholder="Nom d'utilisateur" required />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="inputEmail" class="sr-only">Adresse email</label>
                <?php if (isset($_SESSION['emailExist'])) { ?>
                  <span class="text-danger"><?php echo $_SESSION['emailExist'] ?></span>
                <?php }
                unset($_SESSION['emailExist']); ?>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Adresse email" required />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="inputPassword" class="sr-only">Mot de passe</label>
                <?php if (isset($_SESSION['passMatch'])) { ?>
                  <span class="text-danger"><?php echo $_SESSION['passMatch'] ?></span>
                <?php }
                unset($_SESSION['passMatch']); ?>
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="inputPassword" class="sr-only">Retaper le mot de passe</label>
                <input name="password_repeat" type="password" id="inputPassword" class="form-control" placeholder="Retaper le mot de passe" required />
              </div>
            </div>
          </div>
          <button class="btn-runb-business btn-block" type="submit">
            Créer mon compte et ma boutique
          </button>
        </form>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous"></script>
</body>

</html>
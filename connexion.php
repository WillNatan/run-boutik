<?php
session_start();
if(isset($_SESSION['user'])){
    header('Location: ./');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Connexion</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/signin.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/main.css" />
  </head>
  <body class="text-center">
    <form
      class="form-signin text-center"
      action="processes/login.php"
      method="POST"
    >
      <div class="form-icon">
        <img src="img/logo.png" class="img-fluid" alt="Logo" />
      </div>
      <h1 class="h3 mb-3 font-weight-normal">Veuillez vous authentifier</h1>
      <div class="form-group">
        <label for="inputEmail" class="sr-only">Adresse email</label>
        <?php if(isset($_SESSION['errId'])) {?>
          <span class="text-danger"><?php echo $_SESSION['errId'] ?></span>
        <?php } unset($_SESSION['errId']);?>
        <input
          type="email"
          name="email"
          id="inputEmail"
          class="form-control"
          placeholder="Adresse email"
          required
          autofocus
        />
      </div>
      <div class="form-group">
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <?php if(isset($_SESSION['errPass'])) {?>
          <span class="text-danger"><?php echo $_SESSION['errPass'] ?></span>
        <?php } unset($_SESSION['errPass']);?>
        <input
          name="password"
          type="password"
          id="inputPassword"
          class="form-control"
          placeholder="Mot de passe"
          required
        />
      </div>
      <button class="btn-runb-primary btn-block" type="submit">
        Connexion
      </button>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
      integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ=="
      crossorigin="anonymous"
    ></script>
  </body>
</html>

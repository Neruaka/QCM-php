<?php
session_start();
require('connect.php');

if(isset($_POST["pseudo"]) && isset($_POST["mail"]) && isset($_POST["mdp"]) && isset($_POST["mdp2"])){
    $pseudo = $_POST["pseudo"];
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $mdp2 = $_POST["mdp2"];

    if($mdp == $mdp2){
        // $mdp_crypte = password_hash($mdp, PASSWORD_DEFAULT);
        $id = mysqli_connect("localhost","root","","qcm");
        $req = "INSERT INTO user (pseudo, mail, mdp) VALUES ('$pseudo', '$mail', '$mdp')";
        mysqli_query($id, $req);
        $_SESSION["mail"] = $mail;
        $_SESSION["idu"] = mysqli_insert_id($id);
        $_SESSION["pseudo"] = $pseudo;
        $_SESSION["niveau"] = 1;
        header("Location: login.php");
    }else {
      $erreur = "<h5>Les mots de passe ne correspondent pas !</h5>";
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Inscription</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="vh-100">
  <div class="d-flex align-items-center justify-content-center h-100 w-100">
    <form method="post">
      <!-- Pseudo input -->
      <div class="form-outline mb-4">
        <input type="text" name="pseudo" id="formpseudo" class="form-control" />
        <label class="form-label" for="formpseudo">Pseudo</label>
      </div>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" name="mail" id="form2Example2" class="form-control" />
        <label class="form-label" for="form2Example2">Mail</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" name="mdp" id="form2Example3" class="form-control" />
        <label class="form-label" for="form2Example3">Mot de passe</label>
      </div>

      <!-- Confirm password input -->
      <div class="form-outline mb-4">
        <input type="password" name="mdp2" id="form2Example4" class="form-control" />
        <label class="form-label" for="form2Example4">Confirmer le mot de passe</label>
      </div>
      <?php if(isset($erreur)) echo $erreur?>
      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4">S'inscrire</button>

      <!-- Login link -->
      <div class="text-center">
        <p>Déjà membre ? <a href="login.php">Se connecter</a></p>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<?php
require('connect.php');
session_start();

if(isset($_POST["bout"])){
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $req = "SELECT * FROM user WHERE mail='$mail' and mdp='$mdp'";
    $res = mysqli_query($id, $req);
    $ligne = mysqli_fetch_assoc($res); 
      if(mysqli_num_rows($res)>0){
        $_SESSION["mail"] = $mail;
        $_SESSION["idu"] = $ligne["idu"];
        $_SESSION["pseudo"] = $ligne["pseudo"];
        $_SESSION["niveau"] = $ligne["niveau"];
        header("location:homepage.php");
    }
  else {
    $erreur = "<h5>Mail / mot de passe incorrect !</h5>";
  }
  }
   
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="stylelogin.css">
    <title>Login</title>
</head>
<body class="vh-100">
<div class="d-flex align-items-center justify-content-center h-100">
    <form action="" method="post">
      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" name="mail" id="formail" class="form-control" />
        <label class="form-label" for="formail">Mail</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" name="mdp" id="forpwd" class="form-control" />
        <label class="form-label" for="forpwd">Mot de passe</label>
      </div>
      <?php if(isset($erreur)) echo $erreur?>

      <!-- 2 column grid layout for inline styling -->
      <div class="row mb-4">
      </div>

      <!-- Submit button -->
      <button type="submit" name="bout" class="btn btn-primary btn-block mb-4">Se connecter</button>

      <!-- Register buttons -->
      <div class="text-center">
        <p>Pas encore membre ? <a href="register.php">S'inscrire</a></p>
      </div>
    </form>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
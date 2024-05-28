<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Page principale</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php include 'navbarhp.php';?>
  <div class="container mt-4 d-flex flex-column align-items-center justify-content-center">
      <?php
    if(isset($_SESSION["mail"])) {
      // utilisateur connecté
      echo '<h1>Salut, ' . $_SESSION["pseudo"] . '!</h1>';
      echo '<br><a href="qcm.php" class="btn btn-primary mt-3">Commencer le QCM</a>';
    } else {
      // utilisateur non connecté
      echo '<div class="alert alert-warning" role="alert">Vous devez vous connecter pour jouer au QCM.</div>';
    }
    ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
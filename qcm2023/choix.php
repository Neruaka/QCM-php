<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choix</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php 
    require('navbar.php'); 
        if (($_SESSION["niveau"] == 2) !== true) {
            header('Location: login.php');
            exit;
        }
        ?>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Que voulez-vous faire ?</h1>
        <div class="d-flex justify-content-center">
            <a href="ajouter.php" class="btn btn-primary me-2">Ajouter une question</a>
            <a href="supprimer.php" class="btn btn-danger">Supprimer une question</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script></body>
</html>

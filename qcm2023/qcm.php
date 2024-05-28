<?php

require('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Game</title>
</head>
<body >
    <?php 
        require('navbar.php')
    ?>
    <div class="vh-100">
        <div class="container mt-4 d-flex align-items-center justify-content-center h-75">
            <button type="button" class="btn btn-outline-primary me-2" onclick="window.location.href='facile.php'">Facile</button>
            <button type="button" class="btn btn-outline-primary me-2" onclick="window.location.href='moyen.php'">Moyen</button>
            <button type="button" class="btn btn-outline-primary me-2" onclick="window.location.href='difficile.php'">Difficile</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script></body>
</html>
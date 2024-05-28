<?php
require 'connect.php';

// 
// if (($_SESSION["niveau"] == 2) !== true) {
//     header('Location: login.php');
//     exit;
// }

// Mettre la liste des questions
$req = "SELECT idq, libelleQ FROM questions";
$res = mysqli_query($id, $req);
$questions = mysqli_fetch_all($res, MYSQLI_ASSOC);

// Traitement de la modification d'une question
if (isset($_POST['submit'])) {
    $idq = $_POST['question'];
    $libelleQ = $_POST['libelleQ'];
    // $reponseQ = $_POST['reponseQ'];
    $req = "UPDATE questions SET libelleQ = '$libelleQ' WHERE idq = $idq";
    // , reponseQ = '$reponseQ'
    mysqli_query($id, $req);
    header('Location: modif.php');
    exit;
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier une question</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php require('navbar.php'); ?>

    <div class="container mt-5">
        <h1>Modifier une question</h1>
        <form method="post">
            <div class="form-group">
                <label for="question">Question à modifier:</label>
                <select class="form-control" id="question" name="question">
                    <?php foreach ($questions as $question): ?>
                        <option value="<?= $question['idq'] ?>"><?= $question['libelleQ'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="libelleQ">Nouvelle question:</label>
                <input type="text" class="form-control" id="libelleQ" name="libelleQ">
            </div>
            <div class="form-group">
                <label for="reponseQ">Nouvelle réponse:</label>
                <input type="text" class="form-control" id="reponseQ" name="reponseQ">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

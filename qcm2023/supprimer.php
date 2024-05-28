<?php
require 'connect.php';


// Liste des questions
$req = "SELECT idq, libelleQ FROM questions";
$res = mysqli_query($id, $req);
$questions = mysqli_fetch_all($res, MYSQLI_ASSOC);

// Traitement de la suppression d'une question
if (isset($_POST['submit'])) {
    $idq = $_POST['question'];
    $req = "DELETE FROM questions WHERE idq = $idq";
    mysqli_query($id, $req);
    header('Location: supprimer.php');
    exit;
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Supprimer une question</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php require('navbar.php');
        if (($_SESSION["niveau"] == 2) !== true) {
            header('Location: login.php');
            exit;
        } ?>

    <div class="container mt-5">
        <h1>Supprimer une question</h1>
        <form method="post">
            <div class="form-group">
                <label for="question">Question à supprimer:</label>
                <select class="form-control" id="question" name="question">
                    <?php foreach ($questions as $question): ?>
                        <option value="<?= $question['idq'] ?>"><?= $question['libelleQ'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

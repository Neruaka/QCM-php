<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une question</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
     require('navbar.php');
     require 'connect.php';

    if (($_SESSION["niveau"] == 2) !== true) {
    header('Location: login.php');
    exit;
}

if (isset ($_POST['bout'])) {
    // Get the form data
    $libelleQ = $_POST['libelleQ'];
    $reponse1 = $_POST['reponse1'];
    $reponse2 = $_POST['reponse2'];
    $reponse3 = $_POST['reponse3'];
    $reponse4 = $_POST['reponse4'];
    $reponseCorrecte = $_POST['reponseCorrecte'];
    $niveau = 0;

    // Ajout nouvelle question dans la bdd
    $req = "INSERT INTO questions (libelleQ, niveau) VALUES ('$libelleQ', $niveau)";
    $res = mysqli_query($id, $req);
    $idq = mysqli_insert_id($id);

    // Ajout réponses dans la bdd  CHAT GPT LA JAI PAS REUSSI A FAIRE LE TRUC POUR METTRE LES REPONSES DANS LA BDD
    $req = "INSERT INTO reponses (idq, libeller, verite) VALUES ";
    $req .= "($idq, '$reponse1', " . ($reponseCorrecte == 1 ? 1 : 0) . "), ";
    $req .= "($idq, '$reponse2', " . ($reponseCorrecte == 2 ? 1 : 0) . "), ";
    $req .= "($idq, '$reponse3', " . ($reponseCorrecte == 3 ? 1 : 0) . "), ";
    $req .= "($idq, '$reponse4', " . ($reponseCorrecte == 4 ? 1 : 0) . ")";
    mysqli_query($id, $req);

    // Redirect to the homepage
    header('Location: homepage.php');
    exit;   
}
?>

    <div class="container mt-5">
        <h1>Ajouter une question</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="libelleQ" class="form-label">Libellé de la question</label>
                <input type="text" class="form-control" id="libelleQ" name="libelleQ" required>
            </div>
            <div class="mb-3">
                <label for="reponse1" class="form-label">Réponse 1</label>
                <input type="text" class="form-control" id="reponse1" name="reponse1" required>
            </div>
            <div class="mb-3">
                <label for="reponse2" class="form-label">Réponse 2</label>
                <input type="text" class="form-control" id="reponse2" name="reponse2" required>
            </div>
            <div class="mb-3">
                <label for="reponse3" class="form-label">Réponse 3</label>
                <input type="text" class="form-control" id="reponse3" name="reponse3" required>
            </div>
            <div class="mb-3">
                <label for="reponse4" class="form-label">Réponse 4</label>
                <input type="text" class="form-control" id="reponse4" name="reponse4" required>
            </div>
            <div class="mb-3">
                <label for="reponseCorrecte" class="form-label">Réponse correcte</label>
                <select class="form-select" id="reponseCorrecte" name="reponseCorrecte" required>
                    <option value="1">Réponse 1</option>
                    <option value="2">Réponse 2</option>
                    <option value="3">Réponse 3</option>
                    <option value="4">Réponse 4</option>
                </select>
            </div>
            <button type="submit" name ="bout" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php require('navbar.php') ?>
<div class="container mt-5">
    <h1>Historique</h1>
    <?php
        include "connect.php";
        if ($_SESSION["niveau"] == 2) {
            $req = "select * from resultats order by date desc";
            echo "<form method='post'>
                <div class='form-group'>
                    <label for='utilisateur'>Sélectionner un utilisateur :</label>
                    <select class='form-control' id='utilisateur' name='utilisateur'>
                        <option value='all'>Tous les utilisateurs</option>";
                        $reqa = "select * from user order by pseudo";
                        $resa = mysqli_query($id, $reqa);
                        while ($ligne = mysqli_fetch_assoc($resa)) {
                            echo '<option value="'.$ligne["idu"].'">'.$ligne["pseudo"].'</option>';
                        }
            echo "</select>
                </div>
                <button type='submit'name='bout' class='btn btn-primary'>Afficher l'historique</button>
                </form>";
            $req = "select * from resultats, user where user.idu = resultats.idu  order by date desc";
            if(isset($_POST['bout'])) {
                $req = "select * from resultats where idu = ".$_POST["utilisateur"]." order by date desc";
                $name = $_POST["utilisateur"];
            }
        } 
        else {
            $req = "select * from resultats where idu = ".$_SESSION["idu"]." order by date desc";
            $name = $_SESSION["pseudo"];
        }
        $res = mysqli_query($id, $req);
        if (!$res) {
            die("Error executing SQL query: " . mysqli_error($id));
        }
        while ($ligne = mysqli_fetch_assoc($res)) {
        $idu = $ligne["idu"];
    ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $idu ?> 
                    - Résultats du 
                    <?php echo date("d/m/Y H:i:s", strtotime($ligne["date"])) ?>
                </h5>
                <p class="card-text">Score : 
                    <?php echo $ligne["note"] ?> / 20
                </p>
                <?php 
                if (isset($_POST["delete"])) {
                    $idr = $_POST["idr"];
                    $req = "delete from resultats where idr = $idr";
                    mysqli_query($id, $req);
                    header("Location: histouser.php");
                }
                if($_SESSION["niveau"] == 2){
                    echo " <form method='post');'>
                    <input type='hidden' name='idr' value='";
                    // echo $idr;
                    echo "'>
                    <button type='submit' name='delete' class='btn btn-danger'>Supprimer</button>
                </form>";
}

?>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script></body>
</html>
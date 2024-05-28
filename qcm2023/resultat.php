<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php require('navbar.php') ?>

    <div class="container mt-5">
        <h1>Résultats</h1>
        <?php
        include "connect.php";
        $note = 0;
        foreach ($_POST as $cle => $val) {
            $req = "select * from reponses where idr = $val";
            $res = mysqli_query($id, $req);
            $ligne = mysqli_fetch_assoc($res);
            if ($ligne["verite"] == 1) {
                $note += 2;
                $class = "text-success";
                $icon = "bi bi-check-circle-fill";
                $req2 = "select libelleQ from questions where idq=$cle";
                $res2 = mysqli_query($id, $req2);
                $ligne2 = mysqli_fetch_assoc($res2);
            } else {
                $req2 = "select libelleQ from questions where idq=$cle";
                $res2 = mysqli_query($id, $req2);
                $ligne2 = mysqli_fetch_assoc($res2);
                $req3 = "select * from reponses where idq=$cle and verite=1";
                $res3 = mysqli_query($id, $req3);
                $ligne3 = mysqli_fetch_assoc($res3);
                $note -= 1;
                $class = "text-danger";
                $icon = "bi bi-x-circle-fill";
            }
            $date = date("Y-m-d H:i:s");
            $idu = $_SESSION["idu"];
        ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title <?php echo $class ?>"><?php echo $ligne["libeller"] ?></h5>
                    <p class="card-text">La question était : <?php echo $ligne2["libelleQ"] ?></p>

                    <?php if ($ligne["verite"] == 0) { ?>
                        <p class="card-text">Tu t'es planté à la question : <?php echo $ligne2["libelleQ"] ?><br>Il fallait répondre : <b><?php echo $ligne3["libeller"] ?></b></p>
                    <?php } ?>
                    <i class="<?php echo $icon ?> <?php echo $class ?>"></i>
                </div>
            </div>
        <?php
        }
        $req = "insert into resultats (idu, note, date) values ($idu, $note, '$date')";
        $res = mysqli_query($id, $req);

        $pourcentage = round(($note / 20) * 100);
        ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Score final</h5>
                <p class="card-text"><?php echo $note ?> / 20 (<?php echo $pourcentage ?>%)</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script></body>
</html>
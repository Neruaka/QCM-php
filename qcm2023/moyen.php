<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moyen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
     require('navbar.php') ?>

    <div class="container mt-5">
        <form action="resultat.php" method="post">
            <?php
            include "connect.php";
            $req = "select * from questions order by rand() limit 15";
            $res = mysqli_query($id, $req);
            $cpt = 1;
            while($ligne = mysqli_fetch_assoc($res)){
                $idq = $ligne["idq"];
                $req2 = "select * from reponses where idq = $idq";
                $res2 = mysqli_query($id, $req2);
            ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title">Question <?php echo $cpt ?></h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-3"><?php echo $ligne["libelleQ"] ?></h6>
                        <?php while ($ligne2 = mysqli_fetch_assoc($res2)){ ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="<?php echo $idq ?>" value="<?php echo $ligne2["idr"] ?>">
                                <label class="form-check-label"><?php echo $ligne2["libeller"] ?></label>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php
                $cpt++;
            }
            ?>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script></body>
</html>
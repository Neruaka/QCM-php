<?php
require('connect.php');
// Vérification de la connexion 
// if (($_SESSION["niveau"] == 2) !== true) {
//   header('Location: login.php');
//   exit;
// }
// Traitement de la suppression d'un utilisateur
if (isset($_POST['delete'])) {
  $idb = $_POST['ida'];
  $sql = "DELETE FROM user WHERE id=$idb";
  if (mysqli_query($id, $sql)) {
    echo "Utilisateur supprimé avec succès";
  }
}

// Récupération de la liste des utilisateurs
$sql = "SELECT * FROM user";
$result = mysqli_query($id, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title class="text-center " >Supprimer un utilisateur</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php 
require('navbar.php'); ?>
  <div class="container mt-5">
    <h1>Supprimer un utilisateur</h1>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Pseudo</th>
          <th>Email</th>
          <th>Niveau</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        // Traitement de la suppression d'un utilisateur
          if (isset($_POST['delete'])) {
            $idz = $_POST['ida'];
            $sql = "DELETE FROM user WHERE idu=$idz";
            if (mysqli_query($id, $sql)) {
              echo "Utilisateur supprimé avec succès";
            } 
          }

          // Récupération de la liste des utilisateurs
          $sql = "SELECT * FROM user";
          $result = mysqli_query($id, $sql);

          while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['idu']; ?></td>
            <td><?php echo $row['pseudo']; ?></td>
            <td><?php echo $row['mail']; ?></td>
            <td><?php echo $row['niveau']; ?></td>
            <td>
              <form method="post">
                <input type="hidden" name="ida" value="<?php echo $row['idu']; ?>">
                <button type="submit" name="delete" class="btn btn-danger">Supprimer</button>
              </form>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
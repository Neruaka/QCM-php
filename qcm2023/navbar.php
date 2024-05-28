
<?php 
include "connect.php";
session_start();
if (!isset($_SESSION["pseudo"])){
    header("location:login.php");
}   
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="homepage.php">QCM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php
        // session_start();
        if(isset($_SESSION["mail"])) {
          // utilisateur connecté
          if($_SESSION["niveau"] == 2) {
            // admin connecté
            echo '<li class="nav-item dropdown">';
            echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestion admin</a>';
            echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
            echo '<a class="dropdown-item" href="ajout.php">Ajouter une question</a>';
            echo '<a class="dropdown-item" href="supprimer.php">Supprimer une question</a>';           
            echo '<a class="dropdown-item" href="modif.php">Modifier une question</a>';
            echo '<a class="dropdown-item" href="dltuser.php">Supprimer un utilisateur</a>';
            echo '</div>';
            echo '</li>';
          }
          echo '<li class="nav-item"><a class="nav-link" href="qcm.php">Jouer</a></li>';
          echo '<li class="nav-item"><a class="nav-link" href="histouser.php">Historique</a></li>';
          echo '<li class="nav-item"><a class="nav-link" href="deconnexion.php">Déconnexion</a></li>';
        } else {
          // utilisateur non connecté
          echo '<li class="nav-item"><a class="nav-link" href="login.php">Connexion</a></li>';
          echo '<li class="nav-item"><a class="nav-link" href="register.php">Inscription</a></li>';
        }
        ?>
      </ul>
    </div>
</nav>
<?php
session_start();
echo "Le titulaire du compte ".$_SESSION["mail"]." a été déconnecté";
session_destroy();
header("refresh:3;url=login.php");
//header("location:connexion.php");
?>
<?php 
include "connect.php";
session_start();
if (!isset($_SESSION["pseudo"])){
    header("location:login.php");
}   
?>
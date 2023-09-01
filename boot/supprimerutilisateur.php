<?php
include_once "connection.php";
$id_utilisateur= $_GET['id_utilisateur'];
$req = mysqli_query($conn , "DELETE FROM utilisateur WHERE id_utilisateur = $id_utilisateur");
header("location:utilisateur.php");


?>
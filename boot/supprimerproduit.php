<?php
include_once "connection.php";
$id_produit= $_GET['id_produit'];
$req = mysqli_query($conn , "DELETE FROM produit WHERE id_produit = $id_produit");
header("location:produit.php");


?>
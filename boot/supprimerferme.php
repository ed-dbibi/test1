<?php
include_once "connection.php";
$id= $_GET['id'];
$req = mysqli_query($conn , "DELETE FROM ferme WHERE id = $id");
header("location:ferme.php");


?>
<?php
include_once "connection.php";
$id_variete= $_GET['id_variete'];
$req = mysqli_query($conn , "DELETE FROM variete WHERE id_variete = $id_variete");
header("location:variete.php");


?>
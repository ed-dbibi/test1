<?php
include_once "connection.php";
$id_culture= $_GET['id_culture'];
$req = mysqli_query($conn , "DELETE FROM cutlture WHERE id_culture = $id_culture");
header("location:culture.php");


?>
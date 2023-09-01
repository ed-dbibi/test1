<?php
include_once "connection.php";
$id_tc= $_GET['id_tc'];
$req = mysqli_query($conn , "DELETE FROM traitement_chimique WHERE id_tc = $id_tc");
header("location:traitementchimique.php");


?>
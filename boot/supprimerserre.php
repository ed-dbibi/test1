<?php
include_once "connection.php";
$id_serre = $_GET['id_serre']; 
$req = mysqli_query($conn, "DELETE FROM serre WHERE id_serre = $id_serre");
header("location: serre.php");
?>

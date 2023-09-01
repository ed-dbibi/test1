<?php
include_once "connection.php";
$id_rs= $_GET['id_rs'];
$req = mysqli_query($conn , "DELETE FROM rendement_desserre WHERE id_rs = $id_rs");
header("location:rendementserre.php");


?>
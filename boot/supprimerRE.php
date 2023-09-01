<?php
include_once "connection.php";
$id_rd= $_GET['id_rd'];
$req = mysqli_query($conn , "DELETE FROM rendement_demployer WHERE id_rd = $id_rd");
header("location:rendementemployer.php");


?>
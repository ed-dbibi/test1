<?php
include_once "connection.php";
$id_cc= $_GET['id_cc'];
$req = mysqli_query($conn , "DELETE FROM condition_climatique WHERE id_cc = $id_cc");
header("location:conditionclimatique.php");


?>
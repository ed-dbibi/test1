<?php
include_once "connection.php";
$id_appareil= $_GET['id_appareil'];
$req = mysqli_query($conn , "DELETE FROM appareil WHERE id_appareil = $id_appareil");
header("location:appareil.php");


?>
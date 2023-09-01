<?php
include_once "connection.php";
$idemp= $_GET['idemp'];
$req = mysqli_query($conn , "DELETE FROM employe WHERE idemp = $idemp");
header("location:employer.php");


?>
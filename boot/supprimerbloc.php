
<?php
include_once "connection.php";
$id_bloc= $_GET['id_bloc'];
$req = mysqli_query($conn , "DELETE FROM bloc WHERE id_bloc = $id_bloc");
header("location:bloc.php");


?>
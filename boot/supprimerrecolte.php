<?php
include_once "connection.php";
$id_recolte = $_GET['id_recolte']; 

$query = "DELETE FROM récolte WHERE id_recolte = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_recolte); 
$stmt->execute();

header("location: recolte.php");
?>
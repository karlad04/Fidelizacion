<?php
include '../conexion.php';
$id = $_GET['id'];
$sql = "DELETE FROM ventas WHERE id=$id";
$conn->query($sql);
header("Location: index.php");
?>
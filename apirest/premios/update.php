<?php
include '../conexion.php';
$id = $_POST['id'];
$sql = "UPDATE premios SET nombre=?, descripcion=?, puntos_necesarios=?, imagen=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssssi', $_POST["nombre"], $_POST["descripcion"], $_POST["puntos_necesarios"], $_POST["imagen"], $id);
$stmt->execute();
header("Location: index.php");
?>
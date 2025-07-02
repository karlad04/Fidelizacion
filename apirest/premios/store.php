<?php
include '../conexion.php';
$sql = "INSERT INTO premios (nombre, descripcion, puntos_necesarios, imagen) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssss', $_POST["nombre"], $_POST["descripcion"], $_POST["puntos_necesarios"], $_POST["imagen"]);
$stmt->execute();
header("Location: index.php");
?>
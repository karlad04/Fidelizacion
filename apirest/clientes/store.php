<?php
include '../conexion.php';
$sql = "INSERT INTO clientes (telefono, nombre, apellidos, direccion, correo, estado, ciudad, puntos, contrasena, rol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssssssssss', $_POST["telefono"], $_POST["nombre"], $_POST["apellidos"], $_POST["direccion"], $_POST["correo"], $_POST["estado"], $_POST["ciudad"], $_POST["puntos"], $_POST["contrasena"], $_POST["rol"]);
$stmt->execute();
header("Location: index.php");
?>
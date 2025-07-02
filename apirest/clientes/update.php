<?php
include '../conexion.php';
$id = $_POST['id'];
$sql = "UPDATE clientes SET telefono=?, nombre=?, apellidos=?, direccion=?, correo=?, estado=?, ciudad=?, puntos=?, contrasena=?, rol=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssssssssssi', $_POST["telefono"], $_POST["nombre"], $_POST["apellidos"], $_POST["direccion"], $_POST["correo"], $_POST["estado"], $_POST["ciudad"], $_POST["puntos"], $_POST["contrasena"], $_POST["rol"], $id);
$stmt->execute();
header("Location: index.php");
?>
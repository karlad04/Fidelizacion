<?php
include '../conexion.php';
$id = $_POST['id'];
$sql = "UPDATE ventas SET cliente_id=?, monto=?, puntos=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sssi', $_POST["cliente_id"], $_POST["monto"], $_POST["puntos"], $id);
$stmt->execute();
header("Location: index.php");
?>
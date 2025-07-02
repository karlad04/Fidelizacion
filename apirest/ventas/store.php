<?php
include '../conexion.php';
$sql = "INSERT INTO ventas (cliente_id, monto, puntos) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $_POST["cliente_id"], $_POST["monto"], $_POST["puntos"]);
$stmt->execute();
header("Location: index.php");
?>
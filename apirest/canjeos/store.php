<?php
include '../conexion.php';
$sql = "INSERT INTO canjeos (cliente_id, premio_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $_POST["cliente_id"], $_POST["premio_id"]);
$stmt->execute();
header("Location: index.php");
?>
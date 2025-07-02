<?php
include '../conexion.php';
$id = $_POST['id'];
$sql = "UPDATE canjeos SET cliente_id=?, premio_id=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssi', $_POST["cliente_id"], $_POST["premio_id"], $id);
$stmt->execute();
header("Location: index.php");
?>
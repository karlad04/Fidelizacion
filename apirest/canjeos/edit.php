<?php
include '../conexion.php';
$id = $_GET['id'];
$sql = "SELECT * FROM canjeos WHERE id=$id";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>
<h1>Editar canjeos</h1>
<form action="update.php" method="post">
<input type="hidden" name="id" value="<?= $data['id'] ?>">
cliente_id: <input name="cliente_id" value="<?= $data["cliente_id"] ?>" required><br>
premio_id: <input name="premio_id" value="<?= $data["premio_id"] ?>" required><br>
<button type="submit">Actualizar</button>
</form>

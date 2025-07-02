<?php
include '../conexion.php';
$id = $_GET['id'];
$sql = "SELECT * FROM ventas WHERE id=$id";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>
<h1>Editar ventas</h1>
<form action="update.php" method="post">
<input type="hidden" name="id" value="<?= $data['id'] ?>">
cliente_id: <input name="cliente_id" value="<?= $data["cliente_id"] ?>" required><br>
monto: <input name="monto" value="<?= $data["monto"] ?>" required><br>
puntos: <input name="puntos" value="<?= $data["puntos"] ?>" required><br>
<button type="submit">Actualizar</button>
</form>

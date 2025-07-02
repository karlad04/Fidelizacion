<?php
include '../conexion.php';
$id = $_GET['id'];
$sql = "SELECT * FROM premios WHERE id=$id";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>
<h1>Editar premios</h1>
<form action="update.php" method="post">
<input type="hidden" name="id" value="<?= $data['id'] ?>">
nombre: <input name="nombre" value="<?= $data["nombre"] ?>" required><br>
descripcion: <input name="descripcion" value="<?= $data["descripcion"] ?>" required><br>
puntos_necesarios: <input name="puntos_necesarios" value="<?= $data["puntos_necesarios"] ?>" required><br>
imagen: <input name="imagen" value="<?= $data["imagen"] ?>" required><br>
<button type="submit">Actualizar</button>
</form>

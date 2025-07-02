<?php
include '../conexion.php';
$id = $_GET['id'];
$sql = "SELECT * FROM clientes WHERE id=$id";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>
<h1>Editar clientes</h1>
<form action="update.php" method="post">
<input type="hidden" name="id" value="<?= $data['id'] ?>">
telefono: <input name="telefono" value="<?= $data["telefono"] ?>" required><br>
nombre: <input name="nombre" value="<?= $data["nombre"] ?>" required><br>
apellidos: <input name="apellidos" value="<?= $data["apellidos"] ?>" required><br>
direccion: <input name="direccion" value="<?= $data["direccion"] ?>" required><br>
correo: <input name="correo" value="<?= $data["correo"] ?>" required><br>
estado: <input name="estado" value="<?= $data["estado"] ?>" required><br>
ciudad: <input name="ciudad" value="<?= $data["ciudad"] ?>" required><br>
puntos: <input name="puntos" value="<?= $data["puntos"] ?>" required><br>
contrasena: <input name="contrasena" value="<?= $data["contrasena"] ?>" required><br>
rol: <input name="rol" value="<?= $data["rol"] ?>" required><br>
<button type="submit">Actualizar</button>
</form>

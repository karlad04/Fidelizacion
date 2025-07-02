<?php
include '../conexion.php';
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);
?>
<h1>Lista de clientes</h1>
<a href='create.html'>Agregar nuevo</a>
<table border='1'>
<tr>
<th>id</th><th>telefono</th><th>nombre</th><th>apellidos</th><th>direccion</th><th>correo</th><th>estado</th><th>ciudad</th><th>puntos</th><th>contrasena</th><th>rol</th><th>Acciones</th></tr>
<?php
while($row = $result->fetch_assoc()): ?>
<tr><td><?= $row['id'] ?></td><td><?= $row['telefono'] ?></td><td><?= $row['nombre'] ?></td><td><?= $row['apellidos'] ?></td><td><?= $row['direccion'] ?></td><td><?= $row['correo'] ?></td><td><?= $row['estado'] ?></td><td><?= $row['ciudad'] ?></td><td><?= $row['puntos'] ?></td><td><?= $row['contrasena'] ?></td><td><?= $row['rol'] ?></td><td>
<a href='edit.php?id=<?= $row["id"] ?>'>Editar</a> | 
<a href='delete.php?id=<?= $row["id"] ?>'>Eliminar</a>
</td></tr>
<?php endwhile; ?>
</table>

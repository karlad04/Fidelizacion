<?php
include '../conexion.php';
$sql = "SELECT * FROM premios";
$result = $conn->query($sql);
?>
<h1>Lista de premios</h1>
<a href='create.html'>Agregar nuevo</a>
<table border='1'>
<tr>
<th>id</th><th>nombre</th><th>descripcion</th><th>puntos_necesarios</th><th>imagen</th><th>Acciones</th></tr>
<?php
while($row = $result->fetch_assoc()): ?>
<tr><td><?= $row['id'] ?></td><td><?= $row['nombre'] ?></td><td><?= $row['descripcion'] ?></td><td><?= $row['puntos_necesarios'] ?></td><td><?= $row['imagen'] ?></td><td>
<a href='edit.php?id=<?= $row["id"] ?>'>Editar</a> | 
<a href='delete.php?id=<?= $row["id"] ?>'>Eliminar</a>
</td></tr>
<?php endwhile; ?>
</table>

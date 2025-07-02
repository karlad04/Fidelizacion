<?php
include '../conexion.php';
$sql = "SELECT * FROM ventas";
$result = $conn->query($sql);
?>
<h1>Lista de ventas</h1>
<a href='create.html'>Agregar nuevo</a>
<table border='1'>
<tr>
<th>id</th><th>cliente_id</th><th>monto</th><th>puntos</th><th>Acciones</th></tr>
<?php
while($row = $result->fetch_assoc()): ?>
<tr><td><?= $row['id'] ?></td><td><?= $row['cliente_id'] ?></td><td><?= $row['monto'] ?></td><td><?= $row['puntos'] ?></td><td>
<a href='edit.php?id=<?= $row["id"] ?>'>Editar</a> | 
<a href='delete.php?id=<?= $row["id"] ?>'>Eliminar</a>
</td></tr>
<?php endwhile; ?>
</table>

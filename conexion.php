<?php
$mysqli = new mysqli("localhost", "root", "", "fidelizacion");
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}
?>
<?php
session_start();

if (!isset($_SESSION['usuario_rol'])) {
    header('Location: login.php');
    exit();
}

if ($_SESSION['usuario_rol'] === 'admin') {
    header('Location: view/admin/dashboard.php');
} else {
    header('Location: view/cliente/dashboard.php');
}
exit();
?>

<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Principal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .welcome {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 50px auto;
        }
    </style>
</head>
<body>
    <div class="welcome">
        <h1>Bienvenido, <?php echo $_SESSION['user']['nombre']; ?>!</h1>
        <p>Has accedido correctamente al sistema con autenticación de dos pasos.</p>
    </div>
</body>
</html>

<?php
require 'db.php';
header('Content-Type: application/json');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $result = $conn->query("SELECT * FROM clientes");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
        break;

    case 'POST':
        $input = json_decode(file_get_contents("php://input"), true);
        $stmt = $conn->prepare("INSERT INTO clientes (telefono, nombre, apellidos, direccion, correo, estado, ciudad, puntos, contrasena, rol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssiss", $input['telefono'], $input['nombre'], $input['apellidos'], $input['direccion'], $input['correo'], $input['estado'], $input['ciudad'], $input['puntos'], $input['contrasena'], $input['rol']);
        $stmt->execute();
        echo json_encode(['message' => 'clientes creado']);
        break;

    case 'PUT':
        parse_str(file_get_contents("php://input"), $_PUT);
        $stmt = $conn->prepare("UPDATE clientes SET telefono=?, nombre=?, apellidos=?, direccion=?, correo=?, estado=?, ciudad=?, puntos=?, contrasena=?, rol=? WHERE id=?");
        $stmt->bind_param("sssssssissi", $_PUT['telefono'], $_PUT['nombre'], $_PUT['apellidos'], $_PUT['direccion'], $_PUT['correo'], $_PUT['estado'], $_PUT['ciudad'], $_PUT['puntos'], $_PUT['contrasena'], $_PUT['rol'], $_PUT['id']);
        $stmt->execute();
        echo json_encode(['message' => 'clientes actualizado']);
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DELETE);
        $stmt = $conn->prepare("DELETE FROM clientes WHERE id=?");
        $stmt->bind_param("i", $_DELETE['id']);
        $stmt->execute();
        echo json_encode(['message' => 'clientes eliminado']);
        break;
}
?>

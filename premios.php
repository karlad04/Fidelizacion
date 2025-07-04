<?php
require 'db.php';
header('Content-Type: application/json');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $result = $conn->query("SELECT * FROM premios");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
        break;

    case 'POST':
        $input = json_decode(file_get_contents("php://input"), true);
        $stmt = $conn->prepare("INSERT INTO premios (nombre, descripcion, puntos_necesarios, imagen) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $input['nombre'], $input['descripcion'], $input['puntos_necesarios'], $input['imagen']);
        $stmt->execute();
        echo json_encode(['message' => 'premios creado']);
        break;

    case 'PUT':
        parse_str(file_get_contents("php://input"), $_PUT);
        $stmt = $conn->prepare("UPDATE premios SET nombre=?, descripcion=?, puntos_necesarios=?, imagen=? WHERE id=?");
        $stmt->bind_param("ssisi", $_PUT['nombre'], $_PUT['descripcion'], $_PUT['puntos_necesarios'], $_PUT['imagen'], $_PUT['id']);
        $stmt->execute();
        echo json_encode(['message' => 'premios actualizado']);
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DELETE);
        $stmt = $conn->prepare("DELETE FROM premios WHERE id=?");
        $stmt->bind_param("i", $_DELETE['id']);
        $stmt->execute();
        echo json_encode(['message' => 'premios eliminado']);
        break;
}
?>

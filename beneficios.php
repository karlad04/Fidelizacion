<?php
require 'db.php';
header('Content-Type: application/json');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $result = $conn->query("SELECT * FROM beneficios");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
        break;

    case 'POST':
        $input = json_decode(file_get_contents("php://input"), true);
        $stmt = $conn->prepare("INSERT INTO beneficios (empresa, descripcion) VALUES (?, ?)");
        $stmt->bind_param("ss", $input['empresa'], $input['descripcion']);
        $stmt->execute();
        echo json_encode(['message' => 'beneficios creado']);
        break;

    case 'PUT':
        parse_str(file_get_contents("php://input"), $_PUT);
        $stmt = $conn->prepare("UPDATE beneficios SET empresa=?, descripcion=? WHERE id=?");
        $stmt->bind_param("ssi", $_PUT['empresa'], $_PUT['descripcion'], $_PUT['id']);
        $stmt->execute();
        echo json_encode(['message' => 'beneficios actualizado']);
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DELETE);
        $stmt = $conn->prepare("DELETE FROM beneficios WHERE id=?");
        $stmt->bind_param("i", $_DELETE['id']);
        $stmt->execute();
        echo json_encode(['message' => 'beneficios eliminado']);
        break;
}
?>

<?php
require 'db.php';
header('Content-Type: application/json');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $result = $conn->query("SELECT * FROM canjeos");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
        break;

    case 'POST':
        $input = json_decode(file_get_contents("php://input"), true);
        $stmt = $conn->prepare("INSERT INTO canjeos (cliente_id, premio_id, fecha) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $input['cliente_id'], $input['premio_id'], $input['fecha']);
        $stmt->execute();
        echo json_encode(['message' => 'canjeos creado']);
        break;

    case 'PUT':
        parse_str(file_get_contents("php://input"), $_PUT);
        $stmt = $conn->prepare("UPDATE canjeos SET cliente_id=?, premio_id=?, fecha=? WHERE id=?");
        $stmt->bind_param("iisi", $_PUT['cliente_id'], $_PUT['premio_id'], $_PUT['fecha'], $_PUT['id']);
        $stmt->execute();
        echo json_encode(['message' => 'canjeos actualizado']);
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DELETE);
        $stmt = $conn->prepare("DELETE FROM canjeos WHERE id=?");
        $stmt->bind_param("i", $_DELETE['id']);
        $stmt->execute();
        echo json_encode(['message' => 'canjeos eliminado']);
        break;
}
?>

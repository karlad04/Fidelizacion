<?php
require 'db.php';
header('Content-Type: application/json');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $result = $conn->query("SELECT * FROM ventas");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
        break;

    case 'POST':
        $input = json_decode(file_get_contents("php://input"), true);
        $stmt = $conn->prepare("INSERT INTO ventas (cliente_id, monto, puntos, fecha) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("idis", $input['cliente_id'], $input['monto'], $input['puntos'], $input['fecha']);
        $stmt->execute();
        echo json_encode(['message' => 'ventas creado']);
        break;

    case 'PUT':
        parse_str(file_get_contents("php://input"), $_PUT);
        $stmt = $conn->prepare("UPDATE ventas SET cliente_id=?, monto=?, puntos=?, fecha=? WHERE id=?");
        $stmt->bind_param("idis i", $_PUT['cliente_id'], $_PUT['monto'], $_PUT['puntos'], $_PUT['fecha'], $_PUT['id']);
        $stmt->execute();
        echo json_encode(['message' => 'ventas actualizado']);
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DELETE);
        $stmt = $conn->prepare("DELETE FROM ventas WHERE id=?");
        $stmt->bind_param("i", $_DELETE['id']);
        $stmt->execute();
        echo json_encode(['message' => 'ventas eliminado']);
        break;
}
?>

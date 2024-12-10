<?php

include './database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $id = $input['id'];

    $query = "UPDATE device SET etat = 1 - etat WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $success = $stmt->execute();

    if ($success) {
        $newState = $db->query("SELECT etat FROM device WHERE id = '$id'")->fetchColumn();
        echo json_encode(['success' => true, 'newState' => (int)$newState]);
    } else {
        echo json_encode(['success' => false]);
    }
}

?>
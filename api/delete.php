<?php
// api/delete.php
// DELETE FROM ebikes WHERE id = :id;

header('Content-Type: application/json');
include_once '../config/db_config.php';
include_once '../model/Ebike.php';

$db = (new Database())->getConnection();
$bike = new Ebike($db);
$data = json_decode(file_get_contents("php://input"));

$bike->id = $data->id ?? die(json_encode(['message' => 'ID required']));

if ($bike->delete()) {
  echo json_encode(['message' => 'Ebike deleted']);
} else {
  echo json_encode(['message' => 'Ebike not deleted']);
}
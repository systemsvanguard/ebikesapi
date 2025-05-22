<?php
// api/update.php
// UPDATE ebikes SET ... WHERE id = :id;

header('Content-Type: application/json');
include_once '../config/db_config.php';
include_once '../model/Ebike.php';

$db = (new Database())->getConnection();
$bike = new Ebike($db);
$data = json_decode(file_get_contents("php://input"));

if (!$data || !isset($data->id)) die(json_encode(['message' => 'ID required']));

foreach ($data as $key => $value) {
  if (property_exists($bike, $key)) $bike->$key = $value;
}

if ($bike->update()) {
  echo json_encode(['message' => 'Ebike updated']);
} else {
  echo json_encode(['message' => 'Ebike not updated']);
}
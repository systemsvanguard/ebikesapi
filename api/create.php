<?php
// api/create.php
// INSERT INTO ebikes (...) VALUES (...);

header('Content-Type: application/json');
include_once '../config/db_config.php';
include_once '../model/Ebike.php';

$db = (new Database())->getConnection();
$bike = new Ebike($db);

$data = json_decode(file_get_contents("php://input"));
if (!$data) die(json_encode(['message' => 'No input data provided']));

foreach ($data as $key => $value) {
  if (property_exists($bike, $key)) $bike->$key = $value;
}

if ($bike->create()) {
  echo json_encode(['message' => 'Ebike created']);
} else {
  echo json_encode(['message' => 'Ebike not created']);
}
<?php
// api/read_single.php
// SELECT * FROM ebikes WHERE id = :id LIMIT 1;

header('Content-Type: application/json');
include_once '../config/db_config.php';
include_once '../model/Ebike.php';

$db = (new Database())->getConnection();
$bike = new Ebike($db);

$bike->id = isset($_GET['id']) ? $_GET['id'] : die();
if ($bike->read_single()) {
  echo json_encode($bike);
} else {
  echo json_encode(['message' => 'Ebike not found']);
}
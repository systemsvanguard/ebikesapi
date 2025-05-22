<?php
// api/read.php
// include db & model
// SELECT * FROM ebikes ORDER BY id;


header('Content-Type: application/json');
include_once '../config/db_config.php';
include_once '../model/Ebike.php';

$db = (new Database())->getConnection();
$bike = new Ebike($db);
$stmt = $bike->read();
$rowCount = $stmt->rowCount();

if ($rowCount > 0) {
  $ebikes = [];
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $ebikes[] = $row;
  }
  echo json_encode($ebikes);
} else {
  echo json_encode(['message' => 'No ebikes found']);
}
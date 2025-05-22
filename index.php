<?php
header("Content-Type: application/json");
$request = $_SERVER['REQUEST_URI'];

switch (true) {
  case preg_match('/\\/api\\/read\\.php$/', $request):
    require __DIR__ . '/api/read.php';
    break;

  case preg_match('/\\/api\\/read_single\\.php$/', $request):
    require __DIR__ . '/api/read_single.php';
    break;

  case preg_match('/\\/api\\/create\\.php$/', $request):
    require __DIR__ . '/api/create.php';
    break;

  case preg_match('/\\/api\\/update\\.php$/', $request):
    require __DIR__ . '/api/update.php';
    break;

  case preg_match('/\\/api\\/delete\\.php$/', $request):
    require __DIR__ . '/api/delete.php';
    break;
	
  case preg_match('/\\/starthere\\.php$/', $request):
    require __DIR__ . 'starthere.php';
    break;


  default:
    http_response_code(404);
    echo json_encode(["message" => "The API Endpoint was not found!"]);
    break;
}

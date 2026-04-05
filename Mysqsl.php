<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$json_data = file_get_contents('php://input');

$data = json_decode($json_data, true);

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}

$connect_mysql = new mysqli("localhost", "root", "Admin", "login_flutter");

?>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "nemoo_kopi";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "error" => "Koneksi database gagal"
    ]);
    exit;
}


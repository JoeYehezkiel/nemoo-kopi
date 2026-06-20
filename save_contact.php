<?php
require 'config.php';
header('Content-Type: application/json');

$nama  = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$nohp  = trim($_POST['nohp'] ?? '');
$pesan = trim($_POST['pesan'] ?? '');

if ($nama === '' || $email === '' || $nohp === '' || $pesan === '') {
    echo json_encode([
        'success' => false,
        'error' => 'Data tidak lengkap'
    ]);
    exit;
}

$sql = "INSERT INTO contacts (name, email, phone, message)
        VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $nama, $email, $nohp, $pesan);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode([
        'success' => false,
        'error' => mysqli_error($conn)
    ]);
}

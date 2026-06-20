<?php
header('Content-Type: application/json');
require 'config.php';

// ambil JSON dari JS
$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['name'], $data['phone'], $data['items'])) {
    echo json_encode([
        "success" => false,
        "error" => "Data tidak lengkap"
    ]);
    exit;
}

$name  = mysqli_real_escape_string($conn, $data['name']);
$phone = mysqli_real_escape_string($conn, $data['phone']);
$email = isset($data['email']) ? mysqli_real_escape_string($conn, $data['email']) : null;
$items = $data['items'];

$orderNumber = "ORD-" . date("YmdHis") . rand(100,999);
$total = 0;

foreach ($items as $item) {
    $total += $item['price'] * $item['qty'];
}

// simpan ke orders
$qOrder = mysqli_query($conn, "
    INSERT INTO orders (order_number, customer_name, phone, email, total)
    VALUES ('$orderNumber', '$name', '$phone', '$email', $total)
");

if (!$qOrder) {
    echo json_encode([
        "success" => false,
        "error" => "Gagal simpan order"
    ]);
    exit;
}

$orderId = mysqli_insert_id($conn);

// simpan item
foreach ($items as $item) {
    $itemName = mysqli_real_escape_string($conn, $item['name']);
    $price    = (int)$item['price'];
    $qty      = (int)$item['qty'];
    $subtotal = $price * $qty;

    mysqli_query($conn, "
        INSERT INTO order_items (order_id, item_name, price, qty, subtotal)
        VALUES ($orderId, '$itemName', $price, $qty, $subtotal)
    ");
}

echo json_encode([
    "success" => true,
    "order_number" => $orderNumber,
    "total" => $total
]);

<?php
$data = new Warehouse();
$hardware_name = $_POST['hardware_name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$response = $data->createData(json_encode([
    'hardware_name' => $hardware_name,
    'quantity' => hash('sha256', $quantity),
    'price' => $price
]));

header('Location: ../index.php?message=' . json_decode($response)->message);

<?php
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Warehouse.php');

$data = new Warehouse();
$hardware_name = $_POST['hardware_name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$response = $data->createWarehouse(json_encode([
    'hardware_name' => $hardware_name,
    'quantity' =>  $quantity,
    'price' => $price
]));
header('Location: ../../views/warehouse/index.php?message=' . json_decode($response)->message);

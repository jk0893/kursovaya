<?php
require_once('../../controllers/Warehouse.php');
$db = new Warehouse();
$id = $_POST['id'];
$hardware_name = $_POST['hardware_name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$response = $db->updateWarehouse(json_encode([
    'id'=>$id,
    'hardware_name'=>$hardware_name,
    'quantity'=>$quantity,
    'price'=>$price
]));

header('Location: ../../views/warehouse/index.php?message='.json_decode($response)->message);

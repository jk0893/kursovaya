<?php
require_once('../../controllers/Services.php');
$db = new Services();
$id = $_POST['id'];
$name = $_POST['name'];
$type = $_POST['type'];
$price = $_POST['price'];

$response = $db->updateService(json_encode([
    'id' => $id,
    'name' => $name,
    'type' => $type,
    'price' => $price,
]));
header('Location: ../../views/services/index.php?message='.json_decode($response)->message);
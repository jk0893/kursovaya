<?php
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Services.php');
$data = new Services();
$name = $_POST['name'];
$type = $_POST['type'];
$price = $_POST['price'];

$response = $data->createService(json_encode([
    'name' => $name,
    'type' =>  $type,
    'price' => $price
]));
header('Location: ../../views/services/index.php?message=' . json_decode($response)->message);

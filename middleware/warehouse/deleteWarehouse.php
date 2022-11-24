<?php
require_once ('../../controllers/Warehouse.php');
$db = new Warehouse();
$id = $_POST['id'];

$res = $db->deleteWarehouse(json_encode([
    'id'=>$id
]));
header('Location: ../../views/warehouse/index.php?message='. json_decode($res)->message);
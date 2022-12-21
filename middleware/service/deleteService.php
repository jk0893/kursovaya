<?php
require_once ('../../controllers/Services.php');
$db = new Services();
$id = $_POST['id'];

$res = $db->deleteService(json_encode([
    'id'=>$id
]));
header('Location: ../../views/services/index.php?message='. json_decode($res)->message);
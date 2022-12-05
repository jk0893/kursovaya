<?php
require_once ('../../controllers/Clients.php');
$db = new Clients();
$id = $_POST['id'];

$res = $db->deleteClients(json_encode([
    'id'=>$id
]));
header('Location: ../../views/clients/index.php?message='. json_decode($res)->message);
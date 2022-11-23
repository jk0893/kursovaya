<?php
require_once ('../../controllers/User.php');
$db = new User();
$id = $_POST['id'];

$res = $db->deleteUser(json_encode([
    'id'=>$id
]));
header('Location: ../views/users/index.php?message='. json_decode($res)->message);
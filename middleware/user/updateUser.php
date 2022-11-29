<?php
require_once('../../controllers/User.php');
$db = new User();
$username = $_POST['username'];
$password = $_POST['password'];

$response = $db->updateUser(json_encode([
    'username'=>$username,
    'password'=>$password
]));

header('Location: ../../views/user/index.php?message='.json_decode($response)->message);

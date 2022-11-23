<?php
require_once('../../controllers/User.php');
$db = new User();
$username = $_POST['username'];
$password = $_POST['password'];
$role_id = $_POST['role_id'];

$response = $db->updateUser(json_encode([
    'username'=>$username,
    'password'=>$password,
    'role_id'=>$role_id,
]));

header('Location: ../../views/user/index.php?message='.json_decode($response)->message);

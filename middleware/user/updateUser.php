<?php
require_once('../../controllers/User.php');
$db = new User();
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$role_id = $_POST['role_id'];

$response = $db->updateUser(json_encode([
    'id' => $id,
    'username'=>$username,
    'password'=>$password,
    'role_id'=>$role_id
]));

header('Location: ../../views/users/index.php?message='.json_decode($response)->message);

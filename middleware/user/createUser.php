<?php
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/User.php');

$data = new User();
$username = $_POST['username'];
$password = $_POST['password'];
$role_id = $_POST['role_id'];

$response = $data->createUser(json_encode([
    'username'=>$username,
    'password'=>hash('sha256', $password),
    'role_id'=>$role_id,
]));
header('Location: ../../views/users/index.php?message='.json_decode($response)->message);

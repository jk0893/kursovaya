<?php
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/User.php');

$data = new User();
$name = $_POST['name'];
$password = $_POST['password'];
$role_id = $_POST['role_id'];

$response = $data->createUser(json_encode([
    'name'=>$name,
    'password'=>hash('sha256', $password),
    'role_id'=>$role_id
]));
header('Location: ../../views/users/index.php?message='.json_decode($response)->message);

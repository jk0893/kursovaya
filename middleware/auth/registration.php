<?php
require('../../controllers/Roles.php');
$db = new Roles();
$username = $_POST['username'];
$password = $_POST['password'];
$role_id = $_POST['role_id'];
$response = $db->registration(json_encode([
    'username'=>$username,
    'password'=>$password,
    'role_id'=>3
]));
header("Location: ../../index.php");
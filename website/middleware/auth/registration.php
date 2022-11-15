<?php
require('../../controllers/Roles.php');
$db = new Roles();
$username = $_POST['username'];
$password = $_POST['password'];

$response = $db->registration(json_encode([
    'username'=>$username,
    'password'=>$password,
]));
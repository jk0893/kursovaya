<?php
require('../../controllers/Roles.php');
$db = new Roles();
$username = $_POST['username'];
$password = $_POST['password'];

$db->login(json_encode([
    'username'=>$username,
    'password'=>$password,
]));

session_start();
header('Location: ../../index.php');
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
if($_SESSION['username']->role_id===3) {
    header('Location: ../../views/auth/index.php');
}
if($_SESSION['username']->role_id===2) {
    header('Location: ../../views/auth/index2.php');
}
if($_SESSION['username']->role_id===1) {
    header('Location: ../../index.php');
}
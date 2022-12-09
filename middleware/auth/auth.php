<?php
require_once('../../controllers/Auth.php');
session_start();

$db = new Auth();
$username = $_POST['username'];
$password = $_POST['password'];

$response = $db->login(json_encode([
    'username' => $username,
    'password'=>hash('sha256',$password)
]));

if($_SESSION['user']) {
    header('Location: ../../views/auth/lk.php');
}else{
   $_SESSION['message'] = 'Неправильный пароль или логин';
   header('Location: ../../views/auth/auth.php');
}
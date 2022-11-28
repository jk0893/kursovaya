<?php
session_start();
require_once('../../controllers/DB.php');

$pdo = $this->connect();
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = ("SELECT * FROM users WHERE username='$username' AND password='$password'");
$check_user = $pdo->prepare($sql);
if (!$check_user) {
    $_SESSION['message'] = 'Неверные логин или пароль.';
    header('Location: ../../views/auth/auth.php');
} else {
    $user = $check_user->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['user'] = [
        "id" => $user['id'],
        "username" => $user['username'],
        "password" => $user['password'],
        "avatar" => $user['avatar']
    ];
    header('Location: ../../views/auth/lk.php');
}

<?php
session_start();
$pdo = new PDO('mysql:host=localhost; dbname=serving_comp_tech; charset=utf8', 'root', '');
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$check_user = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$check_user->execute();
$check_user = $check_user->fetch();
if (count($check_user) > 0) {
    $user = $check_user->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user']= [
        "id" => $user['id'],
        "avatar" => $user['avatar'],
        "username" => $user['username'],
        "password" => $user['password'],
    ];
}
else{
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: ../../views/auth/auth.php');
}
?>


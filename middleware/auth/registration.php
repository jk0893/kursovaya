<?php
session_start();
require_once('../../controllers/DB.php');

$username = $_POST['username'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password === $password_confirm) {
    $path = 'uploads/' . time() . $_FILES['avatar']['name'];
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../../' . $path)) {
        $_SESSION['message'] = 'Ошибка при загрузке изображения';
        header('Location: ../../views/auth/registration.php');
    }

    $password=md5($password);
    $connect = $this->connect();
    $sql = $connect->prepare(("INSERT INTO users values ('$username','$password','$password_confirm', '$path')"));
    $_SESSION['message'] = 'Регистрация прошла успешно.';
    header('Location: ../../index.php');
} else {
    $_SESSION['message'] = 'Пароли не совпадают.';
    header('Location: ../../views/auth/registration.php');
}
<?php
session_start();
$pdo = new PDO('mysql:host=localhost; dbname=serving_comp_tech; charset=utf8', 'root', '');
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$password_confirm = $_POST['password_confirm'];
if ($password === $password_confirm) {
    $path = 'uploads/' . time() . $_FILES['avatar']['name'];
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../../' . $path)) {
        $_SESSION['message'] = 'Ошибка при загрузке изображения';
        header('Location: ../../views/auth/registration.php');
    }
    $result = $pdo->query("INSERT INTO users (id, username, password, role_id, avatar) VALUES (NULL, '$username', '$password', '', '$path')");
    $_SESSION['message'] = 'Регистрация прошла успешно.';
    header('Location: ../../index.php');
}
else{
    $_SESSION['message']='Пароли не совпадают';
    header('Location: ../../views/auth/registration.php');
}
?>

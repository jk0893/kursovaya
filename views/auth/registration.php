<?php
session_start();
require('../layout/header.php');
if($_SESSION['user']){
    header('Location: ../../views/auth/lk.php');
}
?>

<form action="../../middleware/auth/registration.php" method="post" enctype="multipart/form-data">
    <label>Логин:</label>
    <input type="search" placeholder="Введите логин" name="username">
    <label>Пароль:</label>
    <input type="search" placeholder="Введите пароль" name="password">
    <label>Аватарка:</label>
    <input type="file" name="avatar">
    <label>Подтверждение пароля:</label>
    <input type="search" placeholder="Подтвердите пароль" name="password_confirm">
    <button type="submit">Зарегистрироваться</button>
    <p>Уже есть аккаунт? - <a href="auth.php"> Авторизуйтесь!</a></p>
    <?php
    if ($_SESSION['message']) {
        echo '<p class="message"> ' . $_SESSION['message'] . ' </p>';
        unset($_SESSION['message']);
    }
    ?>
</form>

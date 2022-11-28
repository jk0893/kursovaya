<?php
session_start();
require('../layout/header.php');
if($_SESSION['user']){
    header('Location: ../../views/auth/lk.php');
}
?>
<body>
<form action="../../middleware/auth/auth.php" method="post" enctype="multipart/form-data">
    <label>Логин:</label>
    <input type="search" placeholder="Введите логин" name="username">
    <label>Пароль:</label>
    <input type="search" placeholder="Введите пароль" name="password">
    <label>Подтверждение пароля:</label>
    <input type="search" placeholder="Подтвердите пароль" name="password_confirm">
    <button type="submit">Авторизация</button>
    <p>Нет аккаунта? - <a href="registration.php"> Зарегистрируйтесь!</a></p>

</form>
</body>
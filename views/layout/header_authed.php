<?php
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <title>Обслуживание компьютерной техники</title>
</head>
<div class="sub-header"></div>
<header>
    <div class="container">
        <div class="pages">
            <div class="logo">
                <a class="display-5" href="/index.php"><img src="/img/logo.png" alt="logo" width="50"></a>
            </div>
            <div class="d-flex">
                <ul class="buttons">
                    <li><a class="btn el1" href="/views/services/index.php">Услуги</a></li>
                    <li><a class="btn el1" href="/views/warehouse/index.php">Склад</a></li>
                    <li><a class="btn el1" href="/views/users/index.php">Пользователи</a></li>
                </ul>
            </div>
            <div class="auth">
                <div class="d-flex">
                    <div class="header_authed">
                        <form action="../../middleware/auth/logout.php" method="post">
                            <a href="../../views/auth/lk.php"><img style="transform: translate(-15px, 0);" src="<?= $_SESSION['user']->avatar ?>" alt="avatar" width="40"></a>
                            <button type="submit" class="btn"
                                    style="color:#a7d4fd; background-color:#5D88AC; border-color: #a7d4fd">Выйти
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
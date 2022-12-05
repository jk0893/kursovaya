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
                <a class="display-5"
                   href="/index.php"><img src="/img/logo.png"
                                          alt="logo"
                                          width="50"></a>
            </div>
            <div class="d-flex">
                <ul class="buttons">
                    <?php
                    if ($_SESSION['user']->role_id == 3) { ?>
                        <li><a class="btn el1" href="/views/services/index.php">Услуги</a></li>
                    <?php }
                    else if ($_SESSION['user']->role_id == 2) { ?>
                        <li><a class="btn el1" href="/views/services/index.php">Услуги</a></li>
                        <li><a class="btn el1" href="/views/warehouse/index.php">Склад</a></li>
                    <?php }
                    else if ($_SESSION['user']->role_id == 1) { ?>
                        <li><a class="btn el1" href="/views/services/index.php">Услуги</a></li>
                        <li><a class="btn el1" href="/views/warehouse/index.php">Склад</a></li>
                        <li><a class="btn el1" href="/views/clients/index.php">Клиенты</a></li>
                        <li><a class="btn el1" href="/views/employee/index.php">Сотрудники</a></li>
                        <li><a class="btn el1" href="/views/users/index.php">Пользователи</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="d-flex" style="transform: translateX(35px)">
                <div>
                    <a href="../../views/auth/lk.php"> <img src="../../<?= $_SESSION['user']->avatar; ?>"
                                                            width="50" height="50"
                                                            alt="avatar"
                                                            style="border-radius: 8px;
                                                            border: 1px solid #2B5477;"></a>
                </div>
                <div>
                    <a href="../../views/auth/lk.php"
                       style="text-decoration: none;
                       margin-left: 50%;
                       color: #a7d4fd">
                        <?= $_SESSION['user']->username ?></a>
                </div>
                <div class="header_authed">
                    <form action="../../middleware/auth/logout.php" method="post">
                        <button type="submit" class="btn"
                                style="color:#a7d4fd; background-color:#5D88AC; border-color: #a7d4fd">Выйти
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
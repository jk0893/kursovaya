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
    <script type='text/javascript' src='/public/js/jquery-3.6.1.min.js'></script>
    <script type='text/javascript'>
        $(document).ready(function () {
            $("#ax1").click(function () {
                if ($("#me1").css("display") === 'none') {
                    $("#me1").slideDown(400);
                    $("#me2").slideUp(400);
                } else $("#me1").slideUp(400);
            });
        });
    </script>
</head>
<div class="sub-header"></div>
<header>
    <div class="container">
        <div class="pages">
            <div class="logo">
                <a class="display-5"
                   href="/index.php"><img  src="/img/logo.png"
                                           alt="logo"
                                           width="55"></a>
            </div>
            <div class="d-flex">
                <ul class="buttons">
                    <?php
                    if ($_SESSION['user']->role_id == 3) { ?>
                        <li><a class="btn el1" href="/views/services/index.php">Услуги</a></li>
                    <?php } if ($_SESSION['user']->role_id == 2) { ?>
                        <li><a class="btn el1" href="/views/services/index.php">Услуги</a></li>
                        <li><a class="btn el1" href="/views/warehouse/index.php">Склад</a></li>
                    <?php } if ($_SESSION['user']->role_id == 1) { ?>
                        <li><a class="btn el1" href="/views/services/index.php">Услуги</a></li>
                        <li><a class="btn el1" href="/views/warehouse/index.php">Склад</a></li>
                        <li><a class="btn el1" href="/views/clients/index.php">Клиенты</a></li>
                        <li><a class="btn el1" href="/views/employee/index.php">Сотрудники</a></li>
                        <li><a class="btn el1" href="/views/users/index.php">Пользователи</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="auth">
                <div class="topl">
                    <div class="wrap">
                        <a href="#" id="ax1"><img src="../../<?= $_SESSION["user"]->avatar ?>"
                                                  width="50" height="50"
                                                  alt="avatar"
                                                  style="text-decoration: none;
                                                  border-radius: 7px;
                                                  border: 2px solid #a7d4fd;
                                                  margin-left: -5%;
                                                  transform: translateY(-15%);
                                                  color: #a7d4fd;"></a>
                        <div class="menux" id='me1' style="border:2px solid #a7d4fd">
                            <div class="mb-4">
                                <div class="mb-3 my-2" style="font-size: 18px; color:#a7d4fd; border-bottom: 2px solid #a7d4fd; padding-bottom: 10px; margin-left: -1px;font-weight: normal;">
                                    <?= $_SESSION['user']->username ?><br>(<?= $_SESSION["user"]->role_name ?>)
                                </div>
                                <div style="transform: translateX(7.5px)">
                                    <a style="color: #a7d4fd;" href="../../views/auth/lk.php"><img style="transform: translate(-7px,-4.5px)" src="../../img/Home_icon_small.png" width="30" height="30"><b>Личный кабинет</b></a>
                                </div>
                            </div>
                            <div class="header_authed">
                                <form action="../../middleware/auth/logout.php" method="post">
                                    <button type="submit" class="btn"
                                            style="color:#a7d4fd; background-color:#2B5477; border-color: #a7d4fd; transform: translate(-25px,-8px); ">
                                        Выйти
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
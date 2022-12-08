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
    <script type='text/javascript' src='/public/js/jquery-3.6.1.min.js'></script>
    <script>
        $(document).ready(function () {
            $("#ax1").click(function () {
                if ($("#me1").css("display") === 'none') {
                    $("#me1").slideDown(400);
                    $("#me2").slideUp(400);
                } else $("#me1").slideUp(400);
            });
            $("#ax2").click(function () {
                if ($("#me2").css("display") === 'none') {
                    $("#me2").slideDown(400);
                    $("#me1").slideUp(400);
                } else $("#me2").slideUp(400);
            });
            $('body').on('click', '.password-checkbox', function () {
                if ($(this).is(':checked')) {
                    $('#password-input').attr('type', 'text');
                } else {
                    $('#password-input').attr('type', 'password');
                }
            });
        });

    </script>
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
                </ul>
            </div>
            <div class="auth">
                <div class='topl'>
                    <div class='wrap'>
                        <a href='#' id='ax1'><img src="/img/user.png" alt="login" width="35"></a>
                        <div class='menux' id='me1' style="border:2px solid #a7d4fd; -ms-filter:progid:DXImageTransform.Microsoft.Glow(color=green, strength=10);
                             filter:progid:DXImageTransform.Microsoft.Glow(color=green, strength=10);">
                            <div>
                                <form action="/middleware/auth/auth.php" method="post" id="container">
                                    <label class="mt-3"
                                           style="color:#a7d4fd; font-size: 20px">Авторизация</label>
                                    <div class="mt-3 mb-1">
                                        <label class="form-label">
                                            <input type="search"
                                                   class="form-control"
                                                   id="auth"
                                                   name="username"
                                                   aria-describedby="username"
                                                   placeholder="Логин"
                                                   size="15"
                                                   required>
                                        </label>
                                    </div>
                                    <div class="password mb-1">
                                        <input type="password"
                                               id="password-input"
                                               placeholder="Введите пароль"
                                               name="password"
                                               class="form-control mb-3">
                                        <label style="color: #a7d4fd">
                                            <input type="checkbox" class="password-checkbox">Показать пароль
                                        </label>
                                    </div>
                                    <button type="submit" class="mb-2 mt-2 btn"
                                            style="color:#a7d4fd; background-color:#5D88AC; border-color: #a7d4fd">
                                        Отправить
                                    </button>
                                </form>
                            </div>
                            <div>
                                <ul>
                                    <li><a href="/views/auth/registration.php" style="transform: translateX(-16.5px)">Зарегистрироваться</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
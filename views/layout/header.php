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
        $( document ).ready(function() {
            $("#ax1").click(function() {
                if($("#me1").css("display") === 'none') {
                    $("#me1").slideDown(400);
                    $("#me2").slideUp(400);
                }
                else $("#me1").slideUp(400);
            });
            $("#ax2").click(function() {
                if($("#me2").css("display") === 'none'){
                    $("#me2").slideDown(400);
                    $("#me1").slideUp(400);
                }
                else $("#me2").slideUp(400);
            });
        });
    </script>
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
                    <li><a class="btn el1" href="/views/users/index.php">Пользователи</a></li>
                    <li><a class="btn el3" href="/views/uslugi/index.php">Услуги</a></li>
                    <li><a class="btn el4" href="/views/warehouse/index.php">Склад</a></li>
                    <li><a class="btn el2" href="../../about.php">О сервисе</a></li>
                </ul>
            </div>
            <ul class="auth">
                <div class="logo">
                    <a class="display-5" href="/index.php"><img src="/img/logo.png" alt="logo" width="50"></a>
                </div>
                <div class='topl'>
                    <div class='wrap'>
                        <a href='#' id='ax1'><img src="/img/user.png" alt="login" width="35"></a>
                        <div class='menux' id='me1'>
                            <div class="login">
                                <form action="header.php" id="container">
                                    <div class="mb-1 position-sticky">
                                        <label class="form-label " style="color:whitesmoke">
                                            <input type="text" class="form-control" id="username"
                                                   aria-describedby="username" placeholder="Логин">
                                        </label>
                                    </div>
                                    <div class="mb-1 position-sticky">
                                        <label for="exampleInputEmail1" style="color:whitesmoke" class="form-label">
                                            <input type="password" class="form-control" id="password"
                                                   aria-describedby="password" placeholder="Пароль">
                                        </label>
                                    </div>
                                    <button type="submit" class="mb-1 btn btn-outline-info"
                                            style="color:whitesmoke; background-color:#76acd9">Отправить
                                    </button>
                                </form>
                            </div>
                            <li><a class="justify-content-center" href="/middleware/auth/registration.php">Нет аккаунта?</a></li>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</header>
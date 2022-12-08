<head>
    <title>Авторизация – Обслуживание компьютерной техники</title>
</head>
<?php
session_start();
if (isset($_SESSION['user'])) {
    require('../../views/layout/header_authed.php');
    header('Location: ../../views/auth/lk.php');
} else {
    require('../../views/layout/header.php');
}
?>
<script type='text/javascript' src='/public/js/jquery-3.6.1.min.js'></script>
<script>
    $(document).ready(function () {
        $('body').on('click', '.password-checkbox', function () {
            if ($(this).is(':checked')) {
                $('#password-input').attr('type', 'text');
            } else {
                $('#password-input').attr('type', 'password');
            }
        });
    });
</script>
<body>
<div id="index" style="transform: translateY(25%)">
    <div class="card auth" id="index-body-auth">
        <div class="card-body">
            <div style="border-radius: 8px">
                <form action="/middleware/auth/auth.php" method="post">
                    <label class="card-title mt-3"
                           style="color:#a7d4fd; font-size: 28px">Авторизация</label>
                    <div class="mt-3 mb-2">
                        <label class="form-label">
                            <input type="search"
                                   class="form-control"
                                   id="auth"
                                   name="username"
                                   aria-describedby="username"
                                   placeholder="Введите логин"
                                   size="25"
                                   required>
                        </label>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            <input type="password"
                                   id="password-input"
                                   placeholder="Введите пароль"
                                   name="password"
                                   size="25"
                                   class="form-control mb-3"
                                   required>
                            <label style="color: #a7d4fd">
                                <input type="checkbox" class="password-checkbox">Показать пароль
                            </label>
                        </label>
                    </div>
                    <button type="submit" class="mb-2 mt-2 btn"
                            style="color:#a7d4fd; background-color:#5D88AC; border-color: #a7d4fd">Отправить
                    </button>
                </form>
            </div>
            <div style="transform: translate(-12.5px, 8px);">
                <ul>
                    <li>Нет аккаунта? - <a style="text-decoration: none; color:#a7d4fd"
                                           href="/views/auth/registration.php">Зарегистрируйся!</a></li>
                </ul>
            </div>
            <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="message"> ' . $_SESSION['message'] . ' </p>';
                unset($_SESSION['message']);
            }
            ?>
        </div>
    </div>
</div>
</body>
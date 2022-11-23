<?php
require('../layout/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Roles.php');
?>
<div class="container mt-5">
    <div class="registration-form mt-5">
        <form action="../../middleware/user/createUser.php"
              method="post"
              class="d-flex flex-column justify-content-center align-items-center">
            <h3 class="mb-5" style="color:#a7d4fd; font-size: 28px">Регистрация</h3>
            <div class="text-white col-5 mb-4">
                <label for="username">
                <input id="username" name="username" type="text" class="form-control" size="25" placeholder="Логин"
                       required>
                </label>
            </div>
            <div class="text-white col-5 mb-3">
                <label for="password">
                <input id="password" name="password" type="password" class="form-control" size="25" placeholder="Пароль"
                       required>
                </label>
            </div>
            <div class="mt-3">
                <button class="btn" id="submit" type="submit">Отправить</button>
            </div>
        </form>
    </div>
</div>
<?php
?>

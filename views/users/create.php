<?php
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->role_id > 1) {
        header('Location:../../index.php');
    }
    require('../../views/layout/header_authed.php');
} else {
    require('../../views/layout/header.php');
}
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/User.php');
?>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/style.css">

    <div class="container mt-5">
        <form action="../../middleware/user/createUser.php"
              method="post"
              class="d-flex flex-column justify-content-center align-items-center mt-3">
            <h3 class="mt-5 mb-4" style="color: #a7d4fd">Добавление</h3>
            <div class="text-white col-2 mb-3">
                <label for="username">
                    <input id="type" name="username" type="search" class="form-control" placeholder="Логин" pattern="[a-zA-Z0-9]+$" required>
                </label>
            </div>
            <div class="text-white col-2 mb-3">
                <label for="password">
                    <input id="type" name="password" type="search" class="form-control" placeholder="Пароль" pattern="[a-zA-Z0-9]+$" required>
                </label>
            </div>
            <div class="text-white col-2 mb-3">
                <label for="role_id">
                    <input id="role" name="role_id" type="number" class="form-control" max="3"
                           placeholder="1 - админ, 2 - сотрудник, 3 - пользователь" required>
                </label>
            </div>
            <div class="mt-2">
                <button class="btn" id="submit" type="submit">Отправить</button>
            </div>
        </form>
    </div>
<?php
?>
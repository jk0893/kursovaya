<?php
require('../layout/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/User.php');
?>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/style.css">
<?php
if (isset($_POST['name'])) {
    $db = new user();
    $data = $db->createUser(json_encode([
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'role_id' => $_POST['role_id']
    ]));
    $message = json_decode($data)->message;
    echo $message;
}
?>
    <div class="container mt-5">
        <form action="../../middleware/user/createUser.php"
              method="post"
              class="d-flex flex-column justify-content-center align-items-center mt-3">
            <h3 class="mt-5 mb-4" style="color: #a7d4fd">Добавление</h3>
            <div class="text-white col-2 mb-3">
                <label>
                    <input id="name" name="name" type="search" class="form-control" placeholder="Логин" required>
                </label>
            </div>
            <div class="text-white col-2 mb-3">
                <label>
                    <input id="type" name="type" type="search" class="form-control" placeholder="Пароль" required>
                </label>
            </div>
            <div class="text-white col-2 mb-3">
                <label for="role">
                    <input id="role" name="role" type="number" class="form-control" max="3" placeholder="1 - админ, 2 - сотрудник, 3 - пользователь" required>
                </label>
            </div>
            <div class="mt-2">
                <button class="btn btn-primary" id="submit" type="submit">Отправить</button>
            </div>
        </form>
    </div>
<?php
?>
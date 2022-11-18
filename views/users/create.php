<?php
require('../layout/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Roles.php');
?>
<div class="container mt-5">
    <form action="../../middleware/user/createUser.php"
          method="post"
          class="d-flex flex-column justify-content-center align-items-center">
        <h3 class="text-white">Добавление</h3>
        <div class="text-white col-5 mb-3">
            <label for="name"></label>
            <input id="name" name="name" type="text" class="form-control" placeholder="Логин" size="15" required>
        </div>
        <div class="text-white col-5 mb-3">
            <label for="password"></label>
            <input id="password" name="password" type="password" class="form-control" placeholder="Пароль" required>
        </div>
        <div class="text-white col-5 mb-3">
            <label for="role">Роль</label>
            <input id="role" name="role" type="number" class="form-control" placeholder="1 - админ, 2 - сотрудник, 3 - пользователь" required>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary" type="submit">Отправить</button>
        </div>
    </form>
</div>
<?php
?>

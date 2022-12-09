<head>
    <title>Изменение пользователя – Обслуживание компьютерной техники</title>
</head>
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
$db = new User();
$data = $db -> getUser();
foreach ($data as $key => $row){ ?>
    <div class="container mt-5" style="display: flex; align-items: start; justify-content: center;">
        <form action="../../middleware/user/updateUser.php"
              method="post"
              class="d-flex flex-column justify-content-center align-items-center mt-3"
              style="background: #2B5477; border-radius: 15px; border: 2px solid #a7d4fd;">
            <input name="id" value="<?= $row['id'] ?>" hidden>
            <h4 style="color:#abd7ff; margin: auto; padding: 25px">Изменение пользователя №<?= $row['id'] ?>: </h4>
            <label class="mb-3" style="color: #abd7ff;">Имя пользователя:
                <input id="type"
                       name="username"
                       type="search"
                       size="25"
                       class="form-control mt-2"
                       placeholder="Логин"
                       value="<?= $row['username'] ?>"
                       pattern="[a-zA-Z0-9]+$" required/>
            </label>
            <label class="mb-5" style="color: #abd7ff;">Пароль:
                <input id="type"
                       name="password"
                       type="search"
                       size="25"
                       class="form-control mt-2"
                       placeholder="Пароль"
                       value="<?= $row['password'] ?>"
                       pattern="[a-zA-Z0-9]+$" required/>
            </label>
            <p>
                <label for="role">
                    <select id="role" name="role_id"
                            style="border-radius: 8px; height: 40px; width: 206px; text-align: center;">
                        <option value="1">Администратор</option>
                        <option value="2?>">Сотрудник</option>
                        <option value="3">Пользователь</option>
                    </select>
                </label>
            </p>
            <div class="mb-4 mt-3">
                <button class="btn" id="submit" type="submit"
                        onclick="return confirm('Вы действительно хотите изменить данный сервис ? ');">Изменить
                </button>
            </div>
        </form>
    </div>
<?php } ?>

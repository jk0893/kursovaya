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
require_once('../../controllers/User.php');
$db = new User();
$data = $db->getUser();
foreach ($data as $key=> $row) {
    ?>
    <div class="card m-3 shadow" id="cards" style="border-radius: 8px">
        <form action="../../middleware/user/updateUser.php" method="post">
            <div class="card-body">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-3">
                    <span class="card-subtitle" style="color: #83c4ff">Имя пользователя: </span>
                    <label for="name">
                        <input class="card-text form-control mt-2"
                               style="border-radius: 6px; border-color: #6e9ecb; background: #6197c0; color: #163a5d"
                               value="<?php echo $row['username']; ?>"
                               id="type"
                               name="username"
                               type="search"
                               placeholder="Логин"
                               pattern="[a-zA-Z0-9]+$" required>
                    </label>
                </div>
                <div class="mb-3">
                    <span class="card-subtitle mb-3" style="color: #83c4ff">Пароль: </span>
                    <label for="type">
                        <input class="card-text" name="quantity"
                               style="border-radius: 6px; border-color: #6e9ecb; background: #6197c0; color: #163a5d"
                               value="<?php echo $row['password']; ?>">
                    </label>
                </div>
                <span style="color: #83c4ff" class="mb-3">Права доступа:</span>
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
                <div class="my-2">
                    <label for="id">
                        <button class="btn" type="submit" id="submit" onclick="return confirm('Вы действительно хотите изменить данный сервис?');">Сохранить</button>
                    </label>
                </div>
            </div>
        </form>
    </div>
<?php } ?>
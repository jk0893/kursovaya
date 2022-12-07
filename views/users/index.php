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

if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->role_id < 3) { ?>
        <div class="buttons">
            <div class="pages">
                <div class="d-flex">
                    <ul class="data">
                        <li><a class="btn el2" id="add_button" href="/views/users/create.php">Добавить</a></li>
                    </ul>
                </div>
            </div>
        </div>
    <?php }
} ?>
<?php
$data = $db->getUser();
foreach ($data as $row): ?>
    <div class="card m-3 shadow" id="cards" style="border-radius: 8px">
        <input name="id" value="<?= $row['id'] ?>" hidden>
        <div class="card-body">
            <h5 class="card-title mb-2" style="color: #a7d4fd">Пользователь №<?= $row['id'] ?></h5>
            <div class="mb-1">
                <span class="card-subtitle" style="color: #83c4ff">Логин: </span>
                <span class="card-text"><?= $row['username']; ?></span>
            </div>
            <div class="mb-1">
                <span class="card-subtitle" type="password" style="color: #83c4ff">Пароль: </span>
                <span class="card-text" type="password"><?= $row['password']?></span>
            </div>
            <div>
                <span class="card-subtitle" style="color: #83c4ff">Права доступа: </span>
                <span class="card-text"><?= $row['role_name']; ?></span>
            </div>
            <div class="wrapper mt-3">
                <div>
                    <label>
                        <a href="../../views/users/update.php" class="btn" type="submit" id="submit">Изменить</a>
                    </label>
                </div>
                <div>
                    <label>
                        <input name="id" value="<?= $row['id']; ?>" type="text" hidden>
                        <a href="../../middleware/user/deleteUser.php" class="btn" type="submit" id="submit"
                                onclick="return confirm('Вы действительно хотите удалить данного пользователя?');">
                            Удалить
                        </a>
                    </label>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
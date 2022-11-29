<?php
session_start();
if (isset($_SESSION['user'])) {
    require('../../views/layout/header_authed.php');
}
else{
    require('../../views/layout/header.php');
}
require_once __DIR__ . '/../../middleware/boot.php';
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/User.php');
$db = new User();
?>
    <div class="buttons">
        <div class="pages">
            <div class="d-flex">
                <ul class="data">
                    <li><a class="btn el2" id="add_button" href="/views/users/create.php">Добавить</a></li>
                </ul>
            </div>
        </div>
    </div>
<?php
$data = $db->getUser();
foreach ($data as $key => $row) {
    ?>
    <div class="card m-4 shadow" id="cards" style="border-radius: 8px">
        <div class="card-body">
            <h5 class="card-title mb-2" style="color: #a7d4fd">Пользователь №<?php echo $row['id'] ?></h5>
            <div class="mb-1">
                <span class="card-subtitle" style="color: #83c4ff">Логин: </span>
                <span class="card-text"><?php echo $row['username']; ?></span>
            </div>
            <div class="mb-1">
                <span class="card-subtitle" style="color: #83c4ff">Пароль: </span>
                <span class="card-text"><?php echo $row['password']; ?></span>
            </div>
            <div>
                <span class="card-subtitle" style="color: #83c4ff">Права доступа: </span>
                <span class="card-text"><?php echo $row['role_name']; ?></span>
            </div>
            <div class="wrapper mt-3">
                <div>
                    <form action="../../views/users/update.php" method="post">
                        <label>
                            <button class="btn" type="submit" id="submit">Изменить</button>
                        </label>
                    </form>
                </div>
                <div>
                    <form action="../../middleware/user/deleteUser.php" method="post">
                        <label>
                            <input name="id" value="<?php echo $row['id']; ?>" type="text" hidden>
                            <button class="btn" type="submit" id="submit"
                                    onclick="return confirm('Вы действительно хотите удалить данного пользователя?');">
                                Удалить
                            </button>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
?>
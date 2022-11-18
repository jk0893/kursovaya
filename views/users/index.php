<?php
require('../layout/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/User.php');
$db = new User();
?>
    <div class="buttons">
        <div class="pages">
            <div class="d-flex">
                <ul class="data">
                    <li><a class="btn el2" href="/views/services/create.php">Добавить</a></li>
                    <li><a class="btn el2" href="/views/services/update.php">Изменить</a></li>
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
            <h5 class="card-title" style="color: #a7d4fd"><?php echo $row['username']; ?></h5>
            <div>
                <span class="card-subtitle" style="color: #83c4ff">Пароль: </span>
                <span class="card-text"><?php echo $row['password']; ?></span>
            </div>
            <div>
                <span class="card-subtitle" style="color: #83c4ff">Права доступа: </span>
                <span class="card-text"><?php echo $row['role_id']; ?></span>
            </div>
            <div class="my-2">
                <div>
                    <form action="../../middleware/user/updateUser.php" method="post">
                        <label>
                            <button class="btn" type="submit" id="submit">Изменить</button>
                        </label>
                    </form>
                </div>
                <div>
                    <form action="../../middleware/user/deleteUser.php" method="post">
                        <label>
                            <input name="id" value="<?php echo $row['id']; ?>" type="text" hidden>
                            <button class="btn" type="submit" id="submit" onclick="return confirm('Вы действительно хотите удалить данного пользователя?');">Удалить</button>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
?>
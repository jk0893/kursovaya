<?php
require_once __DIR__ . '/../../middleware/boot.php';
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/User.php');
$db = new User();
$data = $db->getUser();
foreach ($data as $key => $row) {
    ?>
    <div class="card m-4 shadow" id="cards" style="border-radius: 8px">
        <div class="card-body">
            <img alt="avatar" src="<?php echo $row['path']?>"
            <h5 class="card-title mb-2" style="color: #a7d4fd">Пользователь №<?php echo $row['id'] ?></h5>
            <div class="mb-1">
                <span class="card-subtitle" style="color: #83c4ff">Логин: </span>
                <label>
                    <input class="card-text"
                           style="border-radius: 6px; border-color: #6e9ecb; background: #6197c0; color: #355e85"
                           value="<?php echo $row['username']; ?>"
                           name="username"
                           required>
                </label>
            </div>
            <div class="mb-3">
                <span class="card-subtitle mb-3" style="color: #83c4ff">Пароль: </span>
                <label>
                    <input class="card-text"
                           style="border-radius: 6px; border-color: #6e9ecb; background: #6197c0; color: #355e85"
                           value="<?php echo $row['password']; ?>"
                           name="password"
                           required>
                </label>
            </div>
            <div class="my-2">
                <form action="../../middleware/user/updateUser.php" method="post">
                    <label>
                        <input name="id" value="<?php echo $row['id']; ?>" type="text" hidden>
                        <button class="btn" type="submit" id="submit">Изменить</button>
                    </label>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
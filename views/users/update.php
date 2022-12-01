<?php
session_start();
if (isset($_SESSION['user'])) {
    require('../../views/layout/header_authed.php');
} else {
    require('../../views/layout/header.php');
}
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/User.php');
$db = new User();
$data = $db->getUser();
foreach ($data as $key => $row) {
    ?>
    <form action="../../middleware/user/updateUser.php" method="post">
        <div class="card m-4 shadow" id="cards" style="border-radius: 8px">
            <div class="card-body">
                <h5 class="card-title mb-2" style="color: #a7d4fd">Пользователь №<?php echo $row['id'] ?></h5>
                <div class="mb-1">
                    <span class="card-subtitle" style="color: #83c4ff">Логин: </span>
                    <label>
                        <input class="card-text"
                               type="text"
                               style="text-align: center; border-radius: 6px; border-color: #6e9ecb; background: #6197c0; color: #355e85"
                               value="<?php echo $row['username']; ?>"
                               name="username"
                               required>
                    </label>
                </div>
                <div class="mb-3">
                    <span class="card-subtitle mb-3" style="color: #83c4ff">Пароль: </span>
                    <label>
                        <input class="card-text"
                               type="password"
                               style="text-align: center; border-radius: 6px; border-color: #6e9ecb; background: #6197c0; color: #355e85"
                               value="<?php echo $row['password']; ?>"
                               name="password"
                               required>
                    </label>
                </div>
                <div class="mb-3">
                    <span class="card-subtitle mb-3" style="color: #83c4ff">Права доступа: </span>
                    <label>
                        <input class="card-text"
                               type="number"
                               style="text-align: center; border-radius: 6px; border-color: #6e9ecb; background: #6197c0; color: #355e85"
                               value="<?php echo $row['role_id']; ?>"
                               name="role_id"
                               required>
                    </label>
                </div>
                <div class="my-2">
                    <input name="id" value="<?php echo $row['id']; ?>" type="text" hidden>
                    <label>
                        <button class="btn" type="submit" id="submit">Изменить</button>
                    </label>
                </div>
            </div>
        </div>
    </form>
<?php } ?>
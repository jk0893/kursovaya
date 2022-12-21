<head>
    <title>Услуги – Обслуживание компьютерной техники</title>
</head>
<?php
session_start();
if (isset($_SESSION['user'])) {
    require('../layout/header_authed.php');
} else {
    require('../layout/header.php');
}
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Services.php');
$db = new Services();
?>
<?php
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->role_id <= 2) { ?>
        <div class="buttons">
            <div class="pages">
                <div class="d-flex">
                    <ul class="data">
                        <li><a class="btn el2" id="add_button" href="/views/services/create.php">Добавить</a></li>
                    </ul>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>
<?php
$data = $db->getService();
foreach ($data as $key => $row) {
    ?>
    <div class="card m-3 shadow" id="cards" style="border-radius: 8px">
        <input name="id" value="<?= $row['id'] ?>" hidden>
        <div class="card-body">
            <h5 class="card-title" style="color: #a7d4fd"><?= $row['name']; ?></h5>
            <div class="m-1">
                <span class="card-subtitle" style="color: #83c4ff">Тип: </span>
                <span class="card-text"><?= $row['type']; ?></span>
            </div>
            <div class="m-1">
                <span class="card-subtitle" style="color: #83c4ff">Стоимость: </span>
                <span class="card-text"><?= $row['price']; ?> руб.</span>
            </div>
            <div class="wrapper mt-3">
                <?php
                if (isset($_SESSION['user'])) {
                    if ($_SESSION['user']->role_id <= 2) { ?>
                        <div>
                            <form action="../../views/services/update.php?id=<?= $row['id']?>" method="post">
                                <label>
                                    <button class="btn" type="submit" id="submit">Изменить</button>
                                </label>
                            </form>
                        </div>
                        <div>
                            <form action="../../middleware/service/deleteService.php" method="post">
                                <label>
                                    <input name="id" value="<?php echo $row['id']; ?>" type="text" hidden required>
                                    <button class="btn" type="submit" id="submit"
                                            onclick="return confirm('Вы действительно хотите удалить данного пользователя?');">
                                        Удалить
                                    </button>
                                </label>
                            </form>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
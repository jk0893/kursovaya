<head>
    <title>Клиенты – Обслуживание компьютерной техники</title>
</head>
<?php
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->role_id > 1) {
        header('Location:../../index.php');
    }
    require('../layout/header_authed.php');
} else {
    require('../layout/header.php');
}
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Clients.php');
$db = new Clients();
?>
<?php
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->role_id <= 2) { ?>
        <div class="buttons">
            <div class="pages">
                <div class="d-flex">
                    <ul class="data">
                        <li><a class="btn el2" id="add_button" href="/views/clients/create.php">Добавить</a></li>
                    </ul>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>
<?php
$data = $db->getClients();
foreach ($data as $key => $row) {
    ?>
    <div class="card m-3 shadow" id="cards" style="border-radius: 8px">
        <div class="card-body">
            <h5 class="card-title mb-2" style="color: #a7d4fd">Клиент №<?php echo $row['id'] ?></h5>
            <div class="m-1">
                <span class="card-subtitle" style="color: #83c4ff">Фамилия: </span>
                <span class="card-text"><?php echo $row['last_name']; ?></span>
            </div>
            <div class="m-1">
                <span class="card-subtitle" style="color: #83c4ff">Имя: </span>
                <span class="card-text"><?php echo $row['first_name']; ?></span>
            </div>
            <div class="m-1">
                <span class="card-subtitle" style="color: #83c4ff">Отчество: </span>
                <span class="card-text"><?php echo $row['father_name']; ?></span>
            </div>
            <div class="m-1">
                <span class="card-subtitle" style="color: #83c4ff">Дата рождения: </span>
                <span class="card-text"><?php echo $row['birth_date']; ?></span>
            </div>
            <div class="m-1">
                <span class="card-subtitle" style="color: #83c4ff">Серия и номер паспорта: </span>
                <span class="card-text"><?php echo $row['passport_s_n']; ?></span>
            </div>
            <div class="m-1">
                <span class="card-subtitle" style="color: #83c4ff">Номер телефона: </span>
                <span class="card-text"><?php echo $row['phone_number']; ?></span>
            </div>
            <div class="m-1">
                <span class="card-subtitle" style="color: #83c4ff">Адрес: </span>
                <span class="card-text"><?php echo $row['address']; ?></span>
            </div>
            <div class="wrapper mt-3">
                <div>
                    <form action="../../views/clients/update.php" method="post">
                        <label>
                            <button class="btn" type="submit" id="submit">Изменить</button>
                        </label>
                    </form>
                </div>
                <div>
                    <form action="../../middleware/clients/deleteClient.php" method="post">
                        <label>
                            <input name="id" value="<?php echo $row['id']; ?>" type="text" hidden required>
                            <button class="btn" type="submit" id="submit"
                                    onclick="return confirm('Вы действительно хотите удалить данного клиента?');">
                                Удалить
                            </button>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
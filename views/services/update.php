<head>
    <title>Изменение услуги – Обслуживание компьютерной техники</title>
</head>
<?php
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->role_id > 2) {
        header('Location: index.php');
    }
    require('../../views/layout/header_authed.php');
} else {
    require('../../views/layout/header.php');
}
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Services.php');
$db = new Services();
$data = $db->getService();
foreach ($data as $key => $row) {
    ?>
    <div class="card m-3 shadow" id="cards" style="border-radius: 8px">
        <form action="../../middleware/service/updateService.php" method="post">
            <div class="card-body">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-3">
                    <span class="card-subtitle" style="color: #83c4ff">Название: </span>
                    <label for="name">
                        <input class="card-text" name="hardware_name"
                               style="border-radius: 6px; border-color: #6e9ecb; background: #6197c0; color: #355e85"
                               value="<?php echo $row['name']; ?>">
                    </label>
                </div>
                <div class="mb-3">
                    <span class="card-subtitle mb-3" style="color: #83c4ff">Тип услуги: </span>
                    <label for="type">
                        <input class="card-text" name="type"
                               style="border-radius: 6px; border-color: #6e9ecb; background: #6197c0; color: #355e85"
                               value="<?php echo $row['type']; ?>">
                    </label>
                </div>
                <div class="mb-3">
                    <span class="card-subtitle" style="color: #83c4ff">Стоимость: </span>
                    <label for="price">
                        <input class="card-text mb-1" name="price"
                               style="border-radius: 6px; border-color: #6e9ecb; background: #6197c0; color: #355e85"
                               value="<?php echo $row['price']; ?>">
                    </label>
                </div>
                <div class="my-2">
                    <label for="id">
                        <button class="btn" type="submit" id="submit" onclick="return confirm('Вы действительно хотите изменить данный сервис?');">Сохранить</button>
                    </label>
                </div>
            </div>
        </form>
    </div>
<?php } ?>
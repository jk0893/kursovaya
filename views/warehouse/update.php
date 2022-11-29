<?php
require_once __DIR__ . '/../../middleware/boot.php';
if (isset($_SESSION['user'])) {
    require('../../views/layout/header_authed.php');
} else {
    require('../../views/layout/header.php');
}
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Warehouse.php');
$db = new Warehouse();
$data = $db->getWarehouse();
foreach ($data as $key => $row) {
    ?>
    <div class="card m-4 shadow" id="cards" style="border-radius: 8px">
        <div class="card-body">
            <div class="mb-3">
                <span class="card-subtitle" style="color: #83c4ff">Название: </span>
                <label for="name">
                    <input class="card-text" name="name" style="border-radius: 6px; border-color: #6e9ecb; background: #6197c0; color: #355e85" value="<?php echo $row['hardware_name']; ?>">
                </label>
            </div>
            <div class="mb-3">
                <span class="card-subtitle mb-3" style="color: #83c4ff">Количество: </span>
                <label for="type">
                    <input class="card-text" name="type" style="border-radius: 6px; border-color: #6e9ecb; background: #6197c0; color: #355e85" value="<?php echo $row['quantity']; ?>">
                </label>
            </div>
            <div class="mb-3">
                <span class="card-subtitle" style="color: #83c4ff">Стоимость: </span>
                <label for="price">
                    <input class="card-text mb-1" name="price" style="border-radius: 6px; border-color: #6e9ecb; background: #6197c0; color: #355e85" value="<?php echo $row['price']; ?>">
                </label>
            </div>
            <div class="my-2">
                <form action="../../middleware/service/updateService.php" method="post">
                    <label for="id">
                        <input name="id" value="<?php echo $row['id']; ?>" type="text" hidden>
                        <button class="btn" type="submit" id="submit">Изменить</button>
                    </label>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
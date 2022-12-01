<?php
session_start();
if (isset($_SESSION['user'])) {
    require('../../views/layout/header_authed.php');
} else {
    require('../../views/layout/header.php');
}
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Warehouse.php');
$db = new Warehouse();
?>
    <div class="buttons">
        <div class="d-flex">
            <ul class="data">
                <li><a class="btn" id="add_button" href="/views/warehouse/create.php">Добавить</a></li>
            </ul>
        </div>
    </div>
<?php
$data = $db->getWarehouse();
foreach ($data as $key => $row) {
    ?>
    <div class="card m-3 shadow" id="cards" style="border-radius: 8px">
        <div class="card-body">
            <h5 class="card-title mb-2" style="color: #a7d4fd"><?php echo $row['hardware_name']; ?></h5>
            <div class="mb-1">
                <span class="card-subtitle" style="color: #83c4ff">Количество: </span>
                <span class="card-text"><?php echo $row['quantity']; ?></span>
            </div>
            <div>
                <span class="card-subtitle" style="color: #83c4ff">Стоимость: </span>
                <span class="card-text"><?php echo $row['price']; ?></span>
            </div class="mb-1">
            <div class="wrapper mt-3">
                <div>
                    <form action="../../views/warehouse/update.php" method="post">
                        <label>
                            <button class="btn" type="submit" id="submit">Изменить</button>
                        </label>
                    </form>
                </div>
                <div>
                    <form action="../../middleware/warehouse/deleteWarehouse.php" method="post">
                        <label>
                            <input name="id" value="<?php echo $row['id']; ?>" type="text" hidden>
                            <button class="btn" type="submit" id="submit"
                                    onclick="return confirm('Вы действительно хотите удалить данный предмет?');">Удалить
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
<?php
require('../layout/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Warehouse.php');
$db = new Warehouse();
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
$data = $db->getWarehouse();
foreach ($data as $key => $row) {
    ?>
    <div class="card m-4 shadow" id="cards" style="border-radius: 8px">
        <div class="card-body">
            <h5 class="card-title" style="color: #a7d4fd"><?php echo $row['hardware_name']; ?></h5>
            <div>
                <span class="card-subtitle" style="color: #83c4ff">Количество: </span>
                <span class="card-text"><?php echo $row['quantity']; ?></span>
            </div>
            <div>
                <span class="card-subtitle" style="color: #83c4ff">Стоимость: </span>
                <span class="card-text"><?php echo $row['price']; ?></span>
            </div>
            <div class="my-2">
                <div>
                    <form action="../../middleware/warehouse/updateWarehouse.php" method="post">
                        <label>
                            <button class="btn" type="submit" id="submit">Изменить</button>
                        </label>
                    </form>
                </div>
                <div>
                    <form action="../../middleware/warehouse/deleteWarehouse.php" method="post">
                        <label>
                            <input name="id" value="<?php echo $row['id']; ?>" type="text" hidden>
                            <button class="btn" type="submit" id="submit" onclick="return confirm('Вы действительно хотите удалить данный предмет?');">Удалить</button>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
?>
<?php
require('../layout/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Services.php');
$db = new Services();
?>
    <div class="buttons">
        <div class="pages">
            <div class="d-flex">
                <ul class="data">
                    <li><a class="btn el2" id="add_button" href="/views/services/create.php">Добавить</a></li>
                </ul>
            </div>
        </div>
    </div>
<?php
$data = $db->getService();
foreach ($data as $key => $row) {
    ?>
    <div class="card m-4 shadow" id="cards" style="border-radius: 8px">
        <div class="card-body">
            <h5 class="card-title" style="color: #a7d4fd"><?php echo $row['name']; ?></h5>
            <div class="m-1">
                <span class="card-subtitle" style="color: #83c4ff">Тип: </span>
                <span class="card-text"><?php echo $row['type']; ?></span>
            </div>
            <div class="m-1">
                <span class="card-subtitle" style="color: #83c4ff">Стоимость: </span>
                <span class="card-text"><?php echo $row['price']; ?></span>
            </div>
            <div class="wrapper mt-3">
                <div>
                    <form action="../../views/services/update.php" method="post">
                        <label>
                            <button class="btn" type="submit" id="submit">Изменить</button>
                        </label>
                    </form>
                </div>
                <div>
                    <form action="../../middleware/service/deleteService.php" method="post">
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
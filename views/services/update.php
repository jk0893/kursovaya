<?php
require('../layout/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Services.php');
$db = new Services();
$data = $db->getService();
foreach ($data as $key => $row) {
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
    <div class="card m-4 shadow" id="cards" style="border-radius: 8px">
        <div class="card-body">
            <div class="mb-3">
                <span class="card-subtitle" style="color: #83c4ff">Название: </span>
                <label>
                    <input class="card-text" style="border-radius: 6px; border-color: #6e9ecb; background: #6197c0; color: #355e85" value="<?php echo $row['name']; ?>">
                </label>
            </div>
            <div class="mb-3">
                <span class="card-subtitle mb-3" style="color: #83c4ff">Тип: </span>
                <label>
                    <input class="card-text" style="border-radius: 6px; border-color: #6e9ecb; background: #6197c0; color: #355e85" value="<?php echo $row['type']; ?>">
                </label>
            </div>
            <div class="mb-3">
                <span class="card-subtitle" style="color: #83c4ff">Стоимость: </span>
                <label>
                    <input class="card-text mb-1" style="border-radius: 6px; border-color: #6e9ecb; background: #6197c0; color: #355e85" value="<?php echo $row['price']; ?>">
                </label>
            </div>
            <div class="my-2">
                <form action="../../middleware/service/updateService.php" method="post">
                    <label>
                        <input name="id" value="<?php echo $row['id']; ?>" type="text" hidden>
                        <button class="btn" type="submit" id="submit">Изменить</button>
                    </label>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<?php
?>
<?php
session_start();
if (isset($_SESSION['user'])) {
    require('../../views/layout/header_authed.php');
} else {
    require('../../views/layout/header.php');
}
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Services.php');
$db = new Services();
$data = $db->getService();
foreach ($data as $key => $row) {
    ?>
    <form action="../../middleware/service/updateService.php" method="post">
        <div class="card m-3 shadow" id="cards">
            <div class="card-body">
                <div class="mb-3">
                    <span class="card-subtitle" style="color: #83c4ff">Название: </span>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <label for="name">
                        <input class="card-text" name="name"
                               style="border-radius: 6px; border-color: #6e9ecb; background: #6197c0; color: #355e85"
                               value="<?php echo $row['name']; ?>">
                    </label>
                </div>
                <div class="mb-3">
                    <span class="card-subtitle mb-3" style="color: #83c4ff">Количество: </span>
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
                        <input name="id" value="<?php echo $row['id']; ?>" type="text" hidden>
                        <button class="btn" type="submit" id="submit">Изменить</button>
                    </label>
                </div>
            </div>
        </div>
    </form>
<?php } ?>
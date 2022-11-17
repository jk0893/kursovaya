<?php
require('../layout/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Services.php');
$db = new Services();
?>
<div class="buttons">
    <div class="pages">
        <div class="d-flex">
            <ul class="data">
                <li><a class="btn el2" href="/views/services/create.php">Добавить</a></li>
                <li><a class="btn el2" href="/views/services/update.php">Изменить</a></li>
                <li><a class="btn el2" href="/views/services/delete.php">Удалить</a></li>
            </ul>
        </div>
    </div>
</div>
<!--
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Название</th>
        <th>Тип</th>
        <th>Стоимость</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $data = $db->getService();
    foreach ($data as $key => $row) {
        ?>
        <tr>
            <td><?php echo ++$key; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['price']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
-->
    <div class="card m-4 shadow" id="cards">
        <div class="card-body">
            <h5 class="card-title" style="color: #a7d4fd"><?php echo $row['name'];?></h5>
            <div>
                <span class="card-subtitle" style="color: #83c4ff">Тип: </span>
                <span class="card-text"><?php echo $row['type'];?></span>
            </div>
            <div>
                <span class="card-subtitle" style="color: #83c4ff">Стоимость: </span>
                <span class="card-text"><?php echo $row['price'];?></span>
            </div>
            <div class="my-2">
                <form action="../../middleware/delete.php" method="post">
                    <label>
                        <input name="id" value="<?php echo $row['id'];?>" type="text" hidden>
                        <button class="btn" type="submit" id="submit">Удалить</button>
                    </label>
                </form>
            </div>
        </div>
    </div>
<?php
?>
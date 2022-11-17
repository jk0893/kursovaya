<?php
require_once('../layout/header.php');
require_once('../../controllers/Services.php');
$db = new Services();
?>
<table class="table table-hover table-dark">
    <thead>
    <tr>
        <th>id</th>
        <th>Название услуги</th>
        <th>Сроки</th>
        <th>Стоимость</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $data = $db->getService();
    foreach ($data as $key => $row) {
        ?>
        <tr>
            <form class="mx-2" action="../../middleware/updateService.php" method="post">
                <td>
                    <?php echo ++$key; ?>
                    <input id="id_services" name="id_services" type="text" value="<?php echo $row["id_services"]; ?>" class="form-control" hidden
                           required>
                </td>
                <td>
                    <input id="service" name="service" type="text" value="<?php echo $row["service"]; ?>" class="form-control"
                           required>
                </td>
                <td>
                    <input id="deadlines" name="deadlines" type="text"
                           value="<?php echo $row["deadlines"]; ?>" class="form-control" required>
                </td>
                <td>
                    <input id="price" name="price" type="text" value="<?php echo $row["price"]; ?>"
                           class="form-control" required>
                </td>
                <td>
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </td>
            </form>
        </tr>
    <?php } ?>
    </tbody>
</table>

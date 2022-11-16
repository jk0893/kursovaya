<?php
require('../layout/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Warehouse.php');
$db = new Warehouse();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <title>Планетарий</title>
</head>
<link rel="stylesheet" href="/styles/style.css">
<body>
<style>
    body {
        background: rgb(115, 68, 134);
    }
</style>
<?php
if (isset($_GET['message'])) {
    echo $_GET['message'];
}
?>
<div class="container">
    <div class="pages">
        <div class="d-flex">
            <ul class="buttons">
                <li><a class="btn btn-close-white" href="/index.php">Главная страница</a></li>
            </ul>
            <div class="d-flex">
                <ul class="data">
                    <li><a class="btn btn-close-white" href="/views/data/create.php">Добавить</a></li>
                    <li><a class="btn btn-close-white" href="/views/data/update.php">Изменить</a></li>
                    <li><a class="btn btn-close-white" href="/views/data/delete.php">Удалить</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<table class="table table-hover table-danger">
    <thead>
    <tr>
        <th>#</th>
        <th>Название</th>
        <th>Количество</th>
        <th>Стоимость</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $data = $db->getData();
    foreach ($data as $key => $row) {
        ?>
        <tr>
            <td><?php echo ++$key; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['price']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<div class="container mx-auto">
    <div style="display: grid; grid-template-columns: repeat(3,1fr)">
        <?php
        foreach ($data as $key => $row) {
            ?>
            <div class="card bg-dark bg-opacity-75 m-2">
                <div class="card-body">
                    <div>
                        <span class="card-subtitle text-muted">Название: </span>
                        <span class="card-text"><?php echo $row['name']; ?></span>
                    </div>
                    <div>
                        <span class="card-subtitle text-muted">Количество: </span>
                        <span class="card-title"><?php echo $row['quantity']; ?></span>
                    </div>
                    <div>
                        <span class="card-subtitle text-muted">Стоимость:</span>
                        <span class="card-text"><?php echo $row['price']; ?></span>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<div style="background-color:#bebebe" class="container mx-auto">
    <div style="display: grid; grid-template-columns: repeat(3,1fr)">
        <?php
        $name = new Warehouse();
        $data = $name->getData();
        foreach ($data as $key => $row) {
            ?>
            <div class="card m-2 shadow">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                    <div>
                        <span class="card-subtitle text-muted">Количество: </span>
                        <span class="card-text"><?php echo $row['quantity']; ?></span>
                        <span class="card-subtitle text-muted">Цена: </span>
                        <span class="card-text"><?php echo $row['price']; ?></span>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php
require('../layout/footer.php');
?>
</body>
</html>
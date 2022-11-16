<?php
require('../layout/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Services.php');
$db = new Services();
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

<?php
if (isset($_GET['message'])) {
    echo $_GET['message'];
}
?>

<div class="container">
    <div class="pages">
        <div class="d-flex">
            <ul class="data">
                <li><a class="btn btn-close-white" href="/views/uslugi/create.php">Добавить</a></li>
                <li><a class="btn btn-close-white" href="/views/uslugi/update.php">Изменить</a></li>
                <li><a class="btn btn-close-white" href="/views/uslugi/delete.php">Удалить</a></li>
            </ul>
        </div>
    </div>
</div>
<table class="table table-hover">
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
    $data = $db->getUslugi();
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
        $name = new Services();
        $data = $name->getUslugi();
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
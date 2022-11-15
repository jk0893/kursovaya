<?php
require('../layout/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/User.php');
$db = new User();
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
<div class="container">
    <div class="pages">
        <div class="d-flex">
            <div class="d-flex">
                <ul class="data">
                    <li><a class="btn btn-close-white" href="/views/users/create.php">Добавить</a></li>
                    <li><a class="btn btn-close-white" href="/views/users/update.php">Изменить</a></li>
                    <li><a class="btn btn-close-white" href="/views/users/delete.php">Удалить</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<table class="table text-white-50">
    <thead>
    <tr>
        <th>№</th>
        <th>Логин</th>
        <th>Пароль</th>
        <th>Роль</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $data = $db->getUser();
    foreach ($data as $key => $row) {
        ?>
        <tr>
            <td><?php echo ++$key; ?></td>
            <td><?php echo $row['user']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['role']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php ?>
</body>
</html>
<?php
require('../layout/footer.php');
?>

<?php
require('controllers/User.php');
require('views/layout/header.php');
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
<div>
    <div>
        <div class="mb-2">
            <label class="form-label text-light">Имя:</label>
            <input type="text" class="form-control" id="first_name" aria-describedby="emailHelp">
        </div>
        <div class="mb-2">
            <label class="form-label text-light">Фамилия:</label>
            <input type="text" class="form-control" id="last_name" aria-describedby="emailHelp">
        </div>
        <div class="mb-2">
            <label class="form-label text-light">Отчество:</label>
            <input type="text" class="form-control" id="father_name" aria-describedby="emailHelp">
            <label class="text-white-50">Если нет, пропустите пункт.</label>
        </div>
    </div>
</div>
</body>
</html>

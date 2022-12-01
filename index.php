<?php
session_start();
if (isset($_SESSION['user'])) {
    require('views/layout/header_authed.php');
}
else{
    require('views/layout/header.php');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <title>Обслуживание компьютерной техники</title>
</head>
<link rel="stylesheet" href="styles/style.css">
<body>
<?php
if (isset($_SESSION['message'])) {
    echo '<p class="message" style="color:#a7d4fd; top: 50%"> ' . $_SESSION['message'] . ' </p>';
    unset($_SESSION['message']);
}
?>
<div id="index">
    <div class="card" id="index-body">
        <div>
            <img src="img/about-us.jpg" class="card-img-top mb-3" alt="" style="border-radius: 8px">
        </div>
        <h4 class="card-title">О нашем сервисе</h4>
        <p>Наш сервис нацелен на
            ремонт такой техники, как: <br>устройства ввода (компьютерная мышь, трекбол, тачпад, клавиатура,
            сканер, видео- и веб-камера микрофон, плата видеозахвата и др.), <br>вывода (монитор, дисплей, проектор,
            принтер,
            плоттер, колонки, наушники) и <br>ввода-вывода (дисковод, картридер, USB Hub, МФУ и модемы).</p>
    </div>
</div>
</body>
</html>
<?php
?>
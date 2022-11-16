<?php
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
    <title>Обслуживание компьютерной техники</title>
</head>
<link rel="stylesheet" href="styles/style.css">
<body>
<?php
if (isset($_GET['message'])) {
    echo $_GET['message'];
}
?>
<script src="/public/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
require('views/layout/footer.php');
?>
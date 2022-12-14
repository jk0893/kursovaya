<head>
    <title>Создание услуги – Обслуживание компьютерной техники</title>
</head>
<?php
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->role_id > 2) {
        header('Location: index.php');
    }
    require('../../views/layout/header_authed.php');
} else {
    require('../../views/layout/header.php');
}
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Services.php');
?>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/style.css">

    <div class="container mt-5">
        <form action="../../middleware/service/createService.php"
              method="post"
              class="d-flex flex-column justify-content-center align-items-center mt-3">
            <h3 class="mt-5 mb-4" style="color: #a7d4fd">Добавление</h3>
            <div class="text-white col-2 mb-3">
                <label for="name">
                    <input id="name" name="name" type="search" class="form-control" placeholder="Название" required>
                </label>
            </div>
            <div class="text-white col-2 mb-3">
                <label for="type">
                    <input id="type" name="type" type="search" class="form-control" placeholder="Тип" required>
                </label>
            </div>
            <div class="text-white col-2 mb-3">
                <label for="price">
                    <input id="price" name="price" type="search" class="form-control"
                           placeholder="Стоимость" required>
                </label>
            </div>
            <div class="mt-2">
                <button class="btn btn-primary" id="submit" type="submit">Отправить</button>
            </div>
        </form>
    </div>

<?php
?>
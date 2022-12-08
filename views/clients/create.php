<head>
    <title>Создание клиента – Обслуживание компьютерной техники</title>
</head>
<?php
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->role_id > 1) {
        header('Location:../../index.php');
    }
    require('../layout/header_authed.php');
} else {
    require('../layout/header.php');
}
?>
<div class="container mt-5" style="transform: translateX(25%)">
    <form action="../../middleware/clients/createClient.php"
          method="post"
          class="d-flex flex-column justify-content-center align-items-center mt-3"
          style="background: #2B5477; max-width: 50%; border-radius: 15px">
        <h3 class="mt-4" style="color:#abd7ff">Создание клиента</h3>
        <label class="mt-3" style="color: #abd7ff;">Фамилия:
            <input type="text" class="mb-3" alt="" name="last_name" size="35"
                   placeholder="Фамилия">
        </label>
        <label style="color: #abd7ff;">Имя:
            <input type="text" class="mb-3" alt="" name="first_name" size="35" placeholder="Имя">
        </label>
        <label style="color: #abd7ff;">Отчество:
            <input type="text" class="mb-3" alt="" name="father_name" size="35"
                   placeholder="Отчество">
        </label>
        <label style="color: #abd7ff;">Дата рождения:
            <input type="date" class="mb-3" alt="" size="35" name="birth_date"
                   placeholder="Дата рождения">
        </label>
        <label style="color: #abd7ff;">Серия и номер паспорта:
            <input type="number" maxlength="10" class="mb-3" alt="" size="35" name="passport_s_n"
                   placeholder="Серия & номер паспорта (вводить без пробелов)">
        </label>
        <label style="color: #abd7ff;">Номер телефона:
            <input type="tel" class="mb-3" alt="" size="35" name="phone_number"
                   placeholder="Номер телефона">
        </label>
        <label style="color: #abd7ff;">Адрес:
            <input type="text" maxlength="150" class="mb-2" alt="" size="35" name="address"
                   placeholder="Адрес">
        </label>
        <div>
            <button class="btn my-2" id="submit" type="submit">Создать</button>
        </div>
    </form>
</div>
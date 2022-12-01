<?php
session_start();
if (isset($_SESSION['user'])) {
    require('../../views/layout/header_authed.php');
}
else{
    header('Location: ../../views/auth/auth.php');
}
?>

<body>
<div style="text-align: center; padding-top: 35px; margin-bottom: -35px; color: #2B5477;">
    <h1>Добро пожаловать,(<strike>Лучший пользователь</strike>) 👑<?= $_SESSION['user']->username ?>👑!</h1>
</div>
<div id="index">
    <div class="card" id="index-body-lk">
        <div>
            <img src="<?= $_SESSION['user']->avatar ?>" class="card-img-top mb-3" alt="Здесь должна быть аватарка, но по какой-то причине она не работает" style="border-radius: 8px">
        </div>
        <h3 class="card-title mb-5" style="color: #abd7ff;">Дополнительная информация:</h3>
        <form class="row align-items-center" action="../../middleware/clients/createClient.php" method="post" style="text-align: center">
            <label style="color: #abd7ff;">Фамилия:
                <input type="text" class="mb-3" alt="" name="first_name" size="35" style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;" placeholder="Фамилия">
            </label>
            <label style="color: #abd7ff;">Имя:
                <input type="text" class="mb-3" alt="" name="last_name" size="35" style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;" placeholder="Имя">
            </label>
            <label style="color: #abd7ff;">Отчество:
                <input type="text" class="mb-3" alt="" name="father_name" size="35" style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;" placeholder="Отчество">
            </label>
            <label style="color: #abd7ff;">Дата рождения:
                <input type="date" class="mb-3" alt="" size="35" name="birth_date" style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;" placeholder="Дата рождения">
            </label>
            <label style="color: #abd7ff;">Серия и номер паспорта:
                <input type="number" maxlength="10" class="mb-3" alt="" size="35" name="passport_s_n" style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;" placeholder="Серия & номер паспорта (вводить без пробелов)">
            </label>
            <label style="color: #abd7ff;">Номер телефона:
                <input type="tel" class="mb-3" alt="" size="35" name="phone_number" style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;" placeholder="Номер телефона">
            </label>
            <label style="color: #abd7ff;">Адрес:
                <input type="text" maxlength="150" class="mb-2" alt="" size="35" name="address" style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;" placeholder="Адрес">
            </label>
            <div>
                <button class="btn my-2" id="submit" type="submit">Сохранить</button>
            </div>
        </form>
    </div>
</div>
</body>
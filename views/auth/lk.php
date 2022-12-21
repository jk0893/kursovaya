<?php
session_start();
if (isset($_SESSION['user'])) {
    require('../../views/layout/header_authed.php');
} else {
    header('Location: ../../views/auth/auth.php');
}
$user_id = $_SESSION['user']->id;
$_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];
?>
<head>
    <title><?= $_SESSION['user']->username ?> – Обслуживание компьютерной техники</title>
</head>
<body>
<div style="text-align: center; padding-top: 35px; margin-bottom: -35px; color: #abd7ff;">
    <h1>Добро пожаловать, <?= $_SESSION['user']->username ?>!</h1>
    <img src="../../<?= $_SESSION['user']->avatar ?>" width="200" height="200"
         style="border-radius: 15px; margin-bottom: 50px">
</div>
<?php if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->role_id == 3) {
        echo('
                <div id="index">
                    <div class="card" id="index-body-lk">
                        <h3 class="card-title my-4 mb-4" style="color: #abd7ff;">Дополнительная информация клиента:</h3>
                        <form class="d-flex flex-column justify-content-center align-items-center"
                              action="#" method="post">
                            <label style="color: #abd7ff;">Фамилия:
                                <input type="text" class="mb-3" alt="" name="last_name"
                                       style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                                       placeholder="Фамилия">
                            </label>
                            <label style="color: #abd7ff;">Имя:
                                <input type="text" class="mb-3" alt="" name="first_name"
                                       style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                                       placeholder="Имя">
                            </label>
                            <label style="color: #abd7ff;">Отчество:
                                <input type="text" class="mb-3" alt="" name="father_name"
                                       style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                                       placeholder="Отчество">
                            </label>
                            <label style="color: #abd7ff;">Дата рождения:
                                <input type="date" class="mb-3" alt="" name="birth_date"
                                       style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                                       placeholder="Дата рождения">
                            </label>
                            <label style="color: #abd7ff;">Серия и номер паспорта:
                                <input type="number" maxlength="10" class="mb-3" alt="" name="passport_s_n"
                                       style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                                       placeholder="(вводить без пробелов)">
                            </label>
                            <label style="color: #abd7ff;">Номер телефона:
                                <input type="tel" pattern="(\+?\d[- .]*){7,13}" class="mb-3" alt="" name="phone_number"
                                       style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                                       placeholder="Номер телефона">
                            </label>
                            <label style="color: #abd7ff;">Адрес:
                                <input type="text" maxlength="150" class="mb-2" alt="" name="address"
                                       style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                                       placeholder="Адрес">
                            </label>
                            <input hidden name="user_id" value="<?= $user_id ?>">
                            <div>
                                <button class="btn my-2" id="submit" type="submit">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            ');
    } else if ($_SESSION['user']->role_id <= 2) {
        echo('
                <div id="index">
                    <div class="card" id="index-body-lk">
                        <h3 class="card-title my-4 mb-4" style="color: #abd7ff;">Дополнительная информация сотрудника:</h3>
                        <form class="d-flex flex-column justify-content-center align-items-center" 
                        action="#" method="post">
                            <label style="color: #abd7ff;">Фамилия:
                                <input type="text" class="mb-3" alt="" name="last_name"
                                       style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                                       placeholder="Фамилия">
                            </label>
                            <label style="color: #abd7ff;">Имя:
                                <input type="text" class="mb-3" alt="" name="first_name"
                                       style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                                       placeholder="Имя">
                            </label>
                            <label style="color: #abd7ff;">Отчество:
                                <input type="text" class="mb-3" alt="" name="father_name"
                                       style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                                       placeholder="Отчество">
                            </label>
                            <label style="color: #abd7ff;">Дата рождения:
                                <input type="date" class="mb-3" alt="" name="birth_date"
                                       style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                                       placeholder="Дата рождения">
                            </label>
                            <label style="color: #abd7ff;">Серия и номер паспорта:
                                <input type="number" maxlength="10" class="mb-3" name="passport_s_n"
                                       style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                                       placeholder="(вводить без пробелов)">
                            </label>
                            <label style="color: #abd7ff;">Номер телефона:
                                <input type="tel" pattern="(\+?\d[- .]*){7,13}" class="mb-3" alt="" name="phone_number"
                                       style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                                       placeholder="Номер телефона">
                            </label>
                            <label style="color: #abd7ff;">Адрес:
                                <input type="text" maxlength="150" class="mb-2" alt="" name="address"
                                       style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                                       placeholder="Адрес">
                            </label>
                            <input hidden name="position_id" value="<?= $position_id ?>">
                            <input hidden name="user_id" value="<?= $user_id ?>">
                            <div>
                                <button class="btn my-2" id="submit" type="submit">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
        ');
    }
} ?>
</body>
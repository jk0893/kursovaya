<head>
    <title>Изменение сотрудника – Обслуживание компьютерной техники</title>
</head>
<?php
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->role_id > 1) {
        header('Location:../../index.php');
    }
    require('../../views/layout/header_authed.php');
} else {
    require('../../views/layout/header.php');
}
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Employee.php');
$db = new Employee();
$data = $db->getEmployee();
foreach ($data as $key => $row) {
    ?>
    <div class="card m-4 shadow" id="cards" style="border-radius: 8px">
        <form class="row align-items-center" action="../../middleware/employee/updateEmployee.php" method="post">
            <div class="card-body">
                <h3 style="color: #83c4ff" class="mb-3">Изменение</h3>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-3">
                    <span class="card-subtitle" style="color: #83c4ff">Фамилия: </span>
                    <label for="name" class="card-text" style="color: #abd7ff;">
                        <input type="text" class="mb-2" alt="" name="last_name"
                               style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                               value="<?php echo $row['last_name'] ?>" placeholder="Фамилия">
                    </label>
                </div>
                <div class="mb-2">
                    <span class="card-subtitle" style="color: #83c4ff">Имя:</span>
                    <label>
                        <input type="text" class="mb-3" alt="" name="first_name"
                               style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                               value="<?php echo $row['first_name'] ?>" placeholder="Имя">
                    </label>
                </div>
                <div class="mb-2">
                    <label style="color: #abd7ff;">Отчество:
                        <input type="text" class="mb-3" alt="" name="father_name"
                               style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                               value="<?php echo $row['father_name'] ?>" placeholder="Отчество">
                    </label>
                </div>
                <div class="mb-2">
                    <label style="color: #abd7ff;">Дата рождения:
                        <input type="date" class="mb-3" alt="" name="birth_date"
                               style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                               value="<?php echo $row['birth_date'] ?>" placeholder="Дата рождения">
                    </label>
                </div>
                <div class="mb-2">
                    <label style="color: #abd7ff;">Паспорт:
                        <input type="number" maxlength="10" class="mb-3" alt="" name="passport_s_n"
                               style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                               value="<?php echo $row['passport_s_n'] ?>"
                               placeholder="Серия & номер паспорта (вводить без пробелов)">
                    </label>
                </div>
                <div class="mb-2">
                    <label style="color: #abd7ff;">Телефон:
                        <input type="tel" class="mb-3" alt="" name="phone_number"
                               style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                               value="<?php echo $row['phone_number'] ?>" placeholder="Номер телефона">
                    </label>
                </div>
                <p>
                    <label for="role">
                        <select id="role" name="role_id"
                                style="border-radius: 8px; height: 40px; width: 206px; text-align: center;">
                            <option value="1">Администратор</option>
                            <option value="2?>">Специалист</option>
                            <option value="3">Сотрудник</option>
                        </select>
                    </label>
                </p>
                <div>
                    <button class="btn my-2" id="submit" type="submit"
                            onclick="return confirm('Вы действительно хотите изменить данного сотрудника?');">
                        Изменить
                    </button>
                </div>
            </div>
        </form>
    </div>
<?php } ?>
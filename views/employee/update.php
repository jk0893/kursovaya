<?php
session_start();
if (isset($_SESSION['user'])) {
    require('../../views/layout/header_authed.php');
} else {
    require('../../views/layout/header.php');
}
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Employee.php');
$db = new Employee();
$data = $db->getEmployee();
foreach ($data as $key => $row) {
    ?>
    <form class="row align-items-center" action="../../middleware/employee/updateEmployee.php" method="post">
        <div class="card m-4 shadow" id="cards">
            <div class="card-body">
                <div class="mb-3">
                    <span class="card-subtitle" style="color: #83c4ff">Фамилия: </span>
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>" required>
                    <label class="card-text" style="color: #abd7ff;">
                        <input type="text" class="mb-3" alt="" name="first_name" size="35"
                               style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                               value="<?php echo $row['last_name'] ?>" placeholder="Фамилия">
                    </label>
                </div>
                <div class="mb-3">
                    <span class="card-subtitle" style="color: #83c4ff">Имя:</span>
                    <label>
                        <input type="text" class="mb-3" alt="" name="last_name" size="35"
                               style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                               value="<?php echo $row['first_name'] ?>" placeholder="Имя">
                    </label>
                </div>
                <div class="mb-3">
                    <label style="color: #abd7ff;">Отчество:
                        <input type="text" class="mb-3" alt="" name="father_name" size="35"
                               style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                               value="<?php echo $row['father_name'] ?>" placeholder="Отчество">
                    </label>
                </div>
                <div class="mb-3">
                    <label style="color: #abd7ff;">Дата рождения:
                        <input type="date" class="mb-3" alt="" size="35" name="birth_date"
                               style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                               value="<?php echo $row['birth_date'] ?>" placeholder="Дата рождения">
                    </label>
                </div>
                <div class="mb-3">
                    <label style="color: #abd7ff;">Серия и номер паспорта:
                        <input type="number" maxlength="10" class="mb-3" alt="" size="35" name="passport_s_n"
                               style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                               value="<?php echo $row['passport_s_n'] ?>"
                               placeholder="Серия & номер паспорта (вводить без пробелов)">
                    </label>
                </div>
                <div class="mb-3">
                    <label style="color: #abd7ff;">Номер телефона:
                        <input type="tel" class="mb-3" alt="" size="35" name="phone_number"
                               style="background: #96C9FF;border-radius: 8px; color: #112A46; padding-top:5px;"
                               value="<?php echo $row['phone_number'] ?>" placeholder="Номер телефона">
                    </label>
                </div>
                <div>
                    <button class="btn my-2" id="submit" type="submit"
                            onclick="return confirm('Вы действительно хотите изменить данного клиента?');">Изменить
                    </button>
                </div>
            </div>
        </div>
    </form>
<?php } ?>
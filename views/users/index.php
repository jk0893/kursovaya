<?php
require('../layout/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/User.php');
$db = new User();
?>
<div class="buttons">
    <div class="pages">
        <div class="d-flex">
            <div class="d-flex">
                <ul class="data">
                    <li><a class="btn el2" href="/views/users/create.php">Добавить</a></li>
                    <li><a class="btn el2" href="/views/users/update.php">Изменить</a></li>
                    <li><a class="btn el2" href="/views/users/delete.php">Удалить</a></li>
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
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['role_id']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php
?>

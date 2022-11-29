<?php
require_once __DIR__ . '/../../middleware/boot.php';
session_start();
if (isset($_SESSION['user'])) {
    require('../../views/layout/header_authed.php');
}
else{
    require('../../views/layout/header.php');
}
$user = null;

if (check_auth()) {
// Получим данные пользователя по сохранённому идентификатору
$stmt = pdo()->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<body>
<div style="text-align: center; padding-top: 35px; margin-bottom: -35px; color: #2B5477;">
    <h1>Добро пожаловать!</h1>
</div>
<div id="index">
    <div class="card" id="index-body">
        <div>
            <img src="<?= $_SESSION['user']['avatar'] ?>" class="card-img-top mb-3" alt="" style="border-radius: 8px">
        </div>
        <h4 class="card-title"><?= $_SESSION['user']['username'] ?></h4>
    </div>
</div>
</body>
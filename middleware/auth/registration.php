<?php
require_once('../../controllers/Auth.php');
$db = new Auth();
$username = $_POST['username'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$path = $_FILES['avatar'];
$role_id = 3;
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$father_name = $_POST['father_name'];
$birth_date = $_POST['birth_date'];
$passport_s_n = $_POST['passport_s_n'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];

if ($password === $password_confirm) {
    $path = 'uploads/' . time() . $_FILES['avatar']['name'];
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../../' . $path)) {
        $_SESSION['message'] = 'Ошибка при загрузке картинки';
        header('Location: ../../views/auth/registration.php');
    }
    $response = $db->registration(json_encode([
        'username' => $username,
        'password' => hash('sha256', $password),
        'role_id' => $role_id,
        'avatar' => $path,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'father_name' => $father_name,
        'birth_date' => $birth_date,
        'passport_s_n' => $passport_s_n,
        'phone_number' => $phone_number,
        'address' => $address
    ]));
    echo $response;
    $_SESSION['message'] = 'регистрация прошла успешно!';
    header('Location: ../../views/auth/auth.php');
} else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../auth/registration.php');
}

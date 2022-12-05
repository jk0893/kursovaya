<?php
require_once('../../controllers/Employee.php');
$db = new Employee();
$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$father_name = $_POST['father_name'];
$birth_date = $_POST['birth_date'];
$passport_s_n = $_POST['passport_s_n'];
$phone_number = $_POST['phone_number'];

$response = $db->updateEmployee(json_encode([
    'id' => $id,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'father_name' => $father_name,
    'birth_date' => $birth_date,
    'passport_s_n' => $passport_s_n,
    'phone_number' => $phone_number,
]));
header('Location: ../../views/employee/index.php?message='.json_decode($response)->message);
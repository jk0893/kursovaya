<?php
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Clients.php');
session_start();

$data = new Clients();
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$father_name = $_POST['father_name'];
$birth_date = $_POST['birth_date'];
$passport_s_n = $_POST['passport_s_n'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];
$user_id = $_POST['user_id'];

$response = $data->createClients(json_encode([
    'first_name' => $first_name,
    'last_name' => $last_name,
    'father_name' => $father_name,
    'birth_date' => $birth_date,
    'passport_s_n' => $passport_s_n,
    'phone_number' => $phone_number,
    'address' => $address,
    'user_id' => $user_id
    ]));
print_r($response);
if(isset($_SESSION['user'])){
    if($_SESSION['previous_page'] == "/views/auth/lk.php"){
        header('Location: ../../views/auth/lk.php');
    }
else{
        header('Location: ../../views/clients/index.php?message='.json_decode($response)->message);
    }
}
<?php
require_once ('../../controllers/Employee.php');
$db = new Employee();
$id = $_POST['id'];

$res = $db->deleteEmployee(json_encode([
    'id'=>$id
]));
header('Location: ../../views/employee/index.php?message='. json_decode($res)->message);
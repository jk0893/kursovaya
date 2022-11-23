<?php
$host = 'localhost';
$db_name = 'serving_comp_tech';
$username = $_POST['username'];
$password = $_POST['password'];


$link = mysqli_connect($host, $db_name, $username, $password);
mysqli_query($link, "SET NAMES 'utf8'");

if (isset($_GET['username'])) {
$username = $_GET ['username'];
$query = "DELETE FROM serving_comp_tech.users WHERE username = '". mysql_escape_string($username) ."'";
mysqli_query($link, $query);
}
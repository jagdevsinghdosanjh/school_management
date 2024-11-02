<?php
$server = $_POST['server'];
$username = $_POST['username'];
$password = $_POST['password'];
$database = $_POST['database'];

header("Location: http://localhost/adminer/?server=$server&username=$username&db=$database");
exit();
?>

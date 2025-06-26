<?php
$host = 'localhost';
$db = 'school_management';
$user = 'root';
$pass = 'Kawaljit@1973'; // Example: match your actual MySQL root password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

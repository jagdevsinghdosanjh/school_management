<?php
session_start();
if ($_SESSION['role'] !== 'student') {
    header('Location: unauthorized.php');
    exit();
}
echo "<h2>Welcome, Student!</h2>";
echo "You can view your progress, subjects, and announcements here.";
?>

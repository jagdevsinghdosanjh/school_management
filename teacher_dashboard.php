<?php
session_start();
if ($_SESSION['role'] !== 'teacher') {
    header('Location: unauthorized.php');
    exit();
}
echo "<h2>Welcome, Teacher!</h2>";
echo "You can manage student marks, post announcements, and view class lists.";
?>

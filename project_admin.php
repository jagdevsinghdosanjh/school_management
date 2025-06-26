<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] === 'jagdevsinghdosanjh' && $_POST['password'] === 'Kawaljit@1973') {
        $_SESSION['admin_logged_in'] = true;
        header('Location: create_user.php');
        exit();
    } else {
        $error = "Invalid credentials.";
    }
}
?>
<form method="POST">
    <h2>Admin Login</h2>
    Username: <input type="text" name="username" required /><br/>
    Password: <input type="password" name="password" required /><br/>
    <input type="submit" value="Login as Admin" />
    <?php if (!empty($error)) echo "<p>$error</p>"; ?>
</form>

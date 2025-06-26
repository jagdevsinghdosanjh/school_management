<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header("Location: {$user['role']}_dashboard.php");
        exit();
    } else {
        $error = "Invalid login.";
    }
}
?>
<form method="POST">
    <h2>User Login</h2>
    Username: <input type="text" name="username" required /><br/>
    Password: <input type="password" name="password" required /><br/>
    <input type="submit" value="Login" />
    <?php if (!empty($error)) echo "<p>$error</p>"; ?>
</form>

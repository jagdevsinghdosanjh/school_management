<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: project_admin.php');
    exit();
}
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $stmt = $pdo->prepare("INSERT INTO users (username, password_hash, role) VALUES (?, ?, ?)");
    $stmt->execute([$username, $password_hash, $role]);
    $user_id = $pdo->lastInsertId();

    if ($role === 'student') {
        $stmt = $pdo->prepare("INSERT INTO students (user_id, name, class) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $_POST['name'], $_POST['class']]);
    } elseif ($role === 'teacher') {
        $stmt = $pdo->prepare("INSERT INTO teachers (user_id, name, subject) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $_POST['name'], $_POST['subject']]);
    }

    echo "User created successfully!";
}
?>
<form method="POST">
    <h2>Create New User</h2>
    Username: <input type="text" name="username" required /><br/>
    Password: <input type="password" name="password" required /><br/>
    Role: 
    <select name="role" required onchange="toggleFields(this.value)">
        <option value="">Select role</option>
        <option value="student">Student</option>
        <option value="teacher">Teacher</option>
    </select><br/>

    <div id="student_fields" style="display:none">
        Name: <input type="text" name="name" /><br/>
        Class: <input type="text" name="class" /><br/>
    </div>

    <div id="teacher_fields" style="display:none">
        Name: <input type="text" name="name" /><br/>
        Subject: <input type="text" name="subject" /><br/>
    </div>

    <input type="submit" value="Create User" />
</form>

<script>
function toggleFields(role) {
    document.getElementById('student_fields').style.display = role === 'student' ? 'block' : 'none';
    document.getElementById('teacher_fields').style.display = role === 'teacher' ? 'block' : 'none';
}
</script>

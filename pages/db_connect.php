<?php
$servername = "localhost";
$username = "jagdevsinghdosanjh";
$password = "Kawaljit@1973";
$dbname = "school_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
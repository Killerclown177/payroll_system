<?php
$host = "localhost";
$user = "root"; // Change if you have a different username
$pass = ""; // Change if you have a MySQL password
$dbname = "payroll_system"; // Make sure this database exists

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

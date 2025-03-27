<?php
session_start();
if ($_SESSION['user_type'] != "admin") {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, Admin</h1>
    <a href="auth/logout.php">Logout</a>
</body>
</html>

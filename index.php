

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form action="auth/login.php" method="POST">
        <input type="email" name="email" required placeholder="Email">
        <input type="password" name="password" required placeholder="Password">
        <select name="user_type">
            <option value="admin">Admin</option>
            <option value="employee">Employee</option>
        </select>
        <button type="submit">Login</button>
    </form>
</body>
</html>

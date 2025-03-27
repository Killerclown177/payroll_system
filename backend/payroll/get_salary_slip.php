<?php
header("Content-Type: application/json");

// Database connection
$host = "localhost";
$user = "root"; // Change if necessary
$password = ""; // Change if necessary
$database = "payroll_system"; // Your database name

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed."]));
}

// Get employee ID from request
$employee_id = isset($_GET['employee_id']) ? intval($_GET['employee_id']) : 0;

if ($employee_id > 0) {
    $sql = "SELECT e.name, e.department, e.bank_account, p.basic_salary, p.allowances, p.deductions, p.net_salary, p.payroll_date, p.status
            FROM payroll p
            JOIN employees e ON e.id = p.employee_id
            WHERE p.employee_id = $employee_id
            ORDER BY p.payroll_date DESC LIMIT 1";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(["error" => "No salary slip found for this employee."]);
    }
} else {
    echo json_encode(["error" => "Invalid employee ID."]);
}

$conn->close();
?>








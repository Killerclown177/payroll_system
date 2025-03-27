<?php
session_start();
include 'db.php'; // Ensure your database connection file is included

if (!isset($_SESSION['employee_id'])) {
    echo json_encode(["error" => "Unauthorized access."]);
    exit();
}

$employee_id = $_SESSION['employee_id'];

$query = "SELECT department, start_period, basic_salary, overtime, bonus, 
                 (basic_salary + overtime + bonus) AS total_earnings, 
                 tax, social_security, health_insurance, 
                 (tax + social_security + health_insurance) AS total_deductions, 
                 (basic_salary + overtime + bonus - tax - social_security - health_insurance) AS net_salary, 
                 bank_name, account_number, payment_method 
          FROM payroll WHERE employee_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $employee_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $payroll = $result->fetch_assoc();
    echo json_encode($payroll);
} else {
    echo json_encode(["error" => "No payroll data found."]);
}
?>











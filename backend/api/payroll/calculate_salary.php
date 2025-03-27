<?php
header("Content-Type: application/json");
require_once "../../config/database.php";

$employee_id = $_GET['id'];
$sql = "SELECT salary FROM employees WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employee_id);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();

$salary = $employee['salary'];
$tax = $salary * 0.1;
$net_salary = $salary - $tax;

echo json_encode(["gross_salary" => $salary, "tax" => $tax, "net_salary" => $net_salary]);
?>









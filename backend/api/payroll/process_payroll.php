<?php
require '../config/db.php';

$data = json_decode(file_get_contents("php://input"), true);
$employee_id = $data['employee_id'];
$basic_salary = $data['basic_salary'];
$deductions = $data['deductions'];
$allowances = $data['allowances'];

$net_salary = $basic_salary + $allowances - $deductions;

$sql = "INSERT INTO payroll (employee_id, basic_salary, deductions, allowances, net_salary) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("idddd", $employee_id, $basic_salary, $deductions, $allowances, $net_salary);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Payroll processed"]);
} else {
    echo json_encode(["status" => "error", "message" => "Payroll processing failed"]);
}
?>














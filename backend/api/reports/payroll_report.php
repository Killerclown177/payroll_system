<?php
header("Content-Type: application/json");
require_once "../../config/database.php";

$sql = "SELECT employees.name, payroll.salary, payroll.tax, payroll.net_salary FROM payroll 
        JOIN employees ON payroll.employee_id = employees.id";
$result = $conn->query($sql);

$payrolls = [];
while ($row = $result->fetch_assoc()) {
    $payrolls[] = $row;
}

echo json_encode($payrolls);
?>









<?php
include '../config/database.php';

function calculateSalary($basic, $tax, $deductions) {
    return $basic - ($basic * $tax / 100) - $deductions;
}

$sql = "SELECT id, basic_salary, tax_percentage, deductions FROM employees";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $net_salary = calculateSalary($row['basic_salary'], $row['tax_percentage'], $row['deductions']);
    $update_sql = "UPDATE employees SET net_salary = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("di", $net_salary, $row['id']);
    $stmt->execute();
}
?>

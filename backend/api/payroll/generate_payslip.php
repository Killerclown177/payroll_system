<?php
require '../config/db.php';

$employee_id = $_GET['employee_id'];

$sql = "SELECT * FROM payroll WHERE employee_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employee_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode(["status" => "success", "payslip" => $row]);
} else {
    echo json_encode(["status" => "error", "message" => "Payslip not found"]);
}
?>













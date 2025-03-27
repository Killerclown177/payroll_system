<?php
require '../config/db.php';

$employee_id = $_GET['employee_id'];

$sql = "DELETE FROM employees WHERE employee_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employee_id);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Employee deleted"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to delete employee"]);
}
?>
















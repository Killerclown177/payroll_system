<?php
header("Content-Type: application/json");
require_once "../../config/database.php";

$employee_id = $_GET['id'];
$sql = "SELECT * FROM employees WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employee_id);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();

echo json_encode($employee);
?>








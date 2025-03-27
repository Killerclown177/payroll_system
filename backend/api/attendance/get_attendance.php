<?php
require '../config/db.php';

$employee_id = $_GET['employee_id'];

$sql = "SELECT * FROM attendance WHERE employee_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employee_id);
$stmt->execute();
$result = $stmt->get_result();

$attendance = [];
while ($row = $result->fetch_assoc()) {
    $attendance[] = $row;
}

echo json_encode(["status" => "success", "attendance" => $attendance]);
?>















<?php
include '../config/database.php';

$stmt = $conn->prepare("SELECT * FROM leave_requests WHERE employee_id = ?");
$stmt->bind_param("i", $_GET['employeeId']);
$stmt->execute();
$result = $stmt->get_result();

$leaves = [];
while ($row = $result->fetch_assoc()) {
    $leaves[] = $row;
}

echo json_encode($leaves);
?>






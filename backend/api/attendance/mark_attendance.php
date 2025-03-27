<?php
header("Content-Type: application/json");
require_once "../../config/database.php";

$data = json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO attendance (employee_id, date, status) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $data['employee_id'], $data['date'], $data['status']);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Attendance marked"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error marking attendance"]);
}
?>









<?php
require '../config/db.php';

$data = json_decode(file_get_contents("php://input"), true);
$employee_id = $data['employee_id'];
$name = $data['name'];
$email = $data['email'];
$position = $data['position'];

$sql = "UPDATE employees SET name = ?, email = ?, position = ? WHERE employee_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $name, $email, $position, $employee_id);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Employee updated"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to update employee"]);
}
?>















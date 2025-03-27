<?php
header("Content-Type: application/json");
require_once "../../config/database.php";

$data = json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO employees (name, email, salary, position) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssds", $data['name'], $data['email'], $data['salary'], $data['position']);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Employee added"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error adding employee"]);
}
?>








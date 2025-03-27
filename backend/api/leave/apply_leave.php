<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require "../../config/database.php"; // Database connection file

// Read the JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (!$data || empty($data['employee_id']) || empty($data['leave_type']) || empty($data['start_date']) || empty($data['end_date']) || empty($data['reason'])) {
    echo json_encode(["status" => "error", "message" => "All fields are required!"]);
    exit;
}

// Prepare and execute the query
$employee_id = $conn->real_escape_string($data['employee_id']);
$leave_type = $conn->real_escape_string($data['leave_type']);
$start_date = $conn->real_escape_string($data['start_date']);
$end_date = $conn->real_escape_string($data['end_date']);
$reason = $conn->real_escape_string($data['reason']);
$status = "Pending"; // Default status

$query = "INSERT INTO leave_requests (employee_id, leave_type, start_date, end_date, reason, status, applied_on) 
          VALUES ('$employee_id', '$leave_type', '$start_date', '$end_date', '$reason', '$status', NOW())";

if ($conn->query($query)) {
    echo json_encode(["status" => "success", "message" => "Leave application submitted!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to apply for leave."]);
}

$conn->close();
?>










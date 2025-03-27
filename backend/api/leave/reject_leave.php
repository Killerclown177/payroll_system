<?php
require '../config/db.php';

$data = json_decode(file_get_contents("php://input"), true);
$leave_id = $data['leave_id'];

$sql = "UPDATE leaves SET status = 'rejected' WHERE leave_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $leave_id);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Leave rejected"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to reject leave"]);
}
?>












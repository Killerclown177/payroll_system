<?php
require '../config/db.php';

$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'];

// Simulated response (Replace with actual email functionality)
echo json_encode(["status" => "success", "message" => "Password reset link sent to $email"]);
?>
















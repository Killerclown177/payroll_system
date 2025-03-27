<?php
require_once "../../config/db.php"; // Include your database connection

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["full_name"], $data["email"], $data["password"], $data["user_type"])) {
    echo json_encode(["status" => "error", "message" => "Missing required fields"]);
    exit;
}

$full_name = $data["full_name"];
$email = $data["email"];
$password = password_hash($data["password"], PASSWORD_BCRYPT); // Hash password
$user_type = $data["user_type"];

// Insert into the database
$sql = "INSERT INTO users (full_name, email, password, user_type) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $full_name, $email, $password, $user_type);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "User registered successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to register user"]);
}

$stmt->close();
$conn->close();
?>








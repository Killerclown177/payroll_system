<?php
include '../config/database.php';

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->full_name) && !empty($data->email) && !empty($data->password) && !empty($data->user_type)) {
    $full_name = $data->full_name;
    $email = $data->email;
    $password = password_hash($data->password, PASSWORD_DEFAULT); // Hash password
    $user_type = $data->user_type;

    $query = "INSERT INTO users (full_name, email, password, user_type) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $full_name, $email, $password, $user_type);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "User added successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to add user"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "All fields are required"]);
}
?>









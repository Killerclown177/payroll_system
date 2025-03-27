<?php
session_start();
header("Content-Type: application/json");

require_once "db.php"; // Ensure you have a database connection file

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["userType"]) || !isset($data["password"])) {
    echo json_encode(["success" => false, "error" => "Missing required fields."]);
    exit();
}

$userType = $data["userType"];
$password = $data["password"];

if ($userType === "admin") {
    // Hardcoded admin password (Change this to something secure)
    $adminPassword = "12345##";  

    if ($password === $adminPassword) {
        $_SESSION["role"] = "admin";
        echo json_encode(["success" => true, "redirect" => "/admin-dashboard.html"]);
    } else {
        echo json_encode(["success" => false, "error" => "Invalid admin password."]);
    }
} elseif ($userType === "employee") {
    if (!isset($data["username"])) {
        echo json_encode(["success" => false, "error" => "Username is required for employees."]);
        exit();
    }

    $username = $data["username"];

    // Check employee credentials
    $stmt = $conn->prepare("SELECT id, password FROM employees WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["role"] = "employee";
            $_SESSION["user_id"] = $row["id"];
            echo json_encode(["success" => true, "redirect" => "/employee-dashboard.html"]);
        } else {
            echo json_encode(["success" => false, "error" => "Invalid password."]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "User not found."]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "error" => "Invalid user type."]);
}

$conn->close();
?>

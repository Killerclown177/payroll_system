<?php
include("../config/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_POST['employee_id'];
    $leave_type = $_POST['leave_type'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = "Pending"; // Default status

    $query = "INSERT INTO leave_requests (employee_id, leave_type, start_date, end_date, status, applied_on) 
              VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("issss", $employee_id, $leave_type, $start_date, $end_date, $status);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Leave request submitted"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to submit leave request"]);
    }
}
?>




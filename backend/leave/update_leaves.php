<?php
include("../config/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $leave_id = $_POST['leave_id'];
    $status = $_POST['status']; // "Approved" or "Rejected"

    $query = "UPDATE leave_requests SET status=? WHERE leave_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $status, $leave_id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Leave updated successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Update failed"]);
    }
}
?>





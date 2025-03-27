<?php
header("Content-Type: application/json");
include "../config.php"; // Ensure you have database connection

$sql = "SELECT a.employee_id, e.name, a.date, a.status FROM attendance a 
        JOIN employees e ON a.employee_id = e.id";
$result = mysqli_query($conn, $sql);

$attendance = [];
while ($row = mysqli_fetch_assoc($result)) {
    $attendance[] = $row;
}

echo json_encode($attendance);
?>








<?php
require '../config/db.php';

$sql = "SELECT * FROM leaves";
$result = $conn->query($sql);

$leaves = [];
while ($row = $result->fetch_assoc()) {
    $leaves[] = $row;
}

echo json_encode(["status" => "success", "leaves" => $leaves]);
?>









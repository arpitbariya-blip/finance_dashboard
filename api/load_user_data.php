<?php
include "connect.php";

//$user_id = 2;
 $totaluser = $conn->query("SELECT COUNT(email) as total FROM users")->fetch_assoc()['total'] ?? 0;
 $activeuser = $conn->query("SELECT COUNT(status) as total FROM users where status = 'Active'")->fetch_assoc()['total'] ?? 0;

 $result = $conn->query("SELECT * FROM users");

while($row = $result->fetch_assoc()){
    $user[] = $row;
}

echo json_encode([
    "totaluser" => $totaluser,
    "activeuser" => $activeuser,
    "user" => $user
]);
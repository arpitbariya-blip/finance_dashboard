<?php
session_start();
include "connect.php";

header("Content-Type: application/json");


$email = $_POST['email'] ?? '';
$role = $_POST['role'] ?? '';

if (empty($email) || empty($role)) {
    echo json_encode(["status" => "error", "message" => "All fields required"]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(["status" => "error", "message" => "User not found"]);
    exit;
}

$user = $result->fetch_assoc();


if ($role == $user['role']) {
    echo json_encode(["status" => "error", "message" => "Invalid role"]);
    exit;
}


session_regenerate_id(true);

$_SESSION['user_id'] = $user['id'];
$_SESSION['email']   = $user['email'];
$_SESSION['role']    = $user['role'];

echo json_encode([
    "status" => "success",
    "role"   => $user['role']
]);
?>






<?php
include "connect.php";

header("Content-Type: application/json");

// Only POST allowed
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
    exit;
}

// Get data safely
$full_name = $_POST['full_name'] ?? '';
$email     = $_POST['email'] ?? '';
$role      = $_POST['role'] ?? 'Viewer'; // default for registration
$status    = $_POST['status'] ?? 'Active';

// Validation
if (empty($full_name) || empty($email)) {
    echo json_encode(["status" => "error", "message" => "All fields required"]);
    exit;
}

// Escape
$full_name = mysqli_real_escape_string($conn, $full_name);
$email     = mysqli_real_escape_string($conn, $email);
$role      = mysqli_real_escape_string($conn, $role);
$status    = mysqli_real_escape_string($conn, $status);

// Check duplicate email
$check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
if (mysqli_num_rows($check) > 0) {
    echo json_encode(["status" => "error", "message" => "Email already exists"]);
    exit;
}

// Insert user
$query = "INSERT INTO users (full_name, email, role, status) 
          VALUES ('$full_name', '$email', '$role', '$status')";

if (mysqli_query($conn, $query)) {
    echo json_encode([
        "status" => "success",
        "message" => "User created successfully"
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => mysqli_error($conn)
    ]);
}
?>
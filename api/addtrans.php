<?php
include "connect.php";

header("Content-Type: application/json");

// Only POST allowed
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
    exit;
}

// Get data safely
$date = $_POST['date'] ?? '';
$amount = $_POST['amount'] ?? '';
$category = $_POST['category'] ?? '';
$type = $_POST['type'] ?? ''; // default for registration
$note    = $_POST['note'] ?? '';

// Validation
if (empty($date) || empty($amount) || empty($category) || empty($type) || empty($note)) {
    echo json_encode(["status" => "error", "message" => "All fields required"]);
    exit;
}

// Escape
$date  = mysqli_real_escape_string($conn, $date);
$amount  = mysqli_real_escape_string($conn, $amount);
$category = mysqli_real_escape_string($conn, $category);
$type = mysqli_real_escape_string($conn, $type);
$note     = mysqli_real_escape_string($conn, $note);


// Insert user
$query = "INSERT INTO records (amount, type, category, date, notes)
          VALUES ('$amount', '$type', '$category', '$date','$note')";

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
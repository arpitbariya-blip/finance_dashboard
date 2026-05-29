<?php
include "connect.php";

session_start();
$user_id = $_SESSION['user_id']; // static for demo


$income = $conn->query("SELECT SUM(amount) as total FROM transactions WHERE type='income'")->fetch_assoc()['total'] ?? 0;

// Total Expense
$expense = $conn->query("SELECT SUM(amount) as total FROM transactions WHERE type='expense'")->fetch_assoc()['total'] ?? 0;

$profit = $income - $expense;

// Recent Transactions
$transactions = [];

if($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Analyst'){
$result = $conn->query("SELECT * FROM transactions ORDER BY created_at DESC LIMIT 5");
}
else
    {
        $result = $conn->query("SELECT * FROM transactions where user_id=$user_id ORDER BY created_at DESC LIMIT 5");
    }

while($row = $result->fetch_assoc()){
    $transactions[] = $row;
}

echo json_encode([
    "income" => $income,
    "expense" => $expense,
    "profit" => $profit,
    "transactions" => $transactions
]);
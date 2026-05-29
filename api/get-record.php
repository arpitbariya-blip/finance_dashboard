<?php
include "connect.php"; // DB connection

$income = $conn->query("SELECT SUM(amount) as total FROM records WHERE type='income'")->fetch_assoc()['total'] ?? 0;


$expense = $conn->query("SELECT SUM(amount) as total FROM records WHERE type='expense'")->fetch_assoc()['total'] ?? 0;

$profit = $income - $expense;


echo json_encode([
    "income" => $income,
    "expense" => $expense,
    "profit" => $profit,
]);
?>
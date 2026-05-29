<?php
function checkRole($allowedRoles) {
    session_start();
    
    if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], $allowedRoles)) {
        http_response_code(403);
        echo json_encode(["error" => "Access Denied"]);
        exit();
    }
}
?>
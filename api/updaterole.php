<?php
include 'connect.php';

$id = $_POST['id'];
$role = $_POST['role'];
    
mysqli_query($conn,"UPDATE users SET role='$role' WHERE id='$id'");

echo json_encode(["status"=>"updated"]);
 ?>
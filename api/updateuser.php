<?php
include 'connect.php';

$id = $_POST['id'];
$status = $_POST['status'];
    
mysqli_query($conn,"UPDATE users SET status='$status' WHERE id='$id'");

echo json_encode(["status"=>"updated"]);
    


?>
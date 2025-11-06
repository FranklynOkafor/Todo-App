<?php
session_start();
include "db.php";

$id = $_POST['id'];
$status = $_POST['completed'];
$user_id = $_SESSION['user_id'];

$sql = "UPDATE tasks 
        SET completed = $status 
        WHERE id = $id AND user_id = $user_id";

mysqli_query($conn, $sql);

echo "success";

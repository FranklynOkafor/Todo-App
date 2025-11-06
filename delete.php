<?php


session_start();
include "db.php";

$id = $_POST['id'];
$user_id = $_SESSION['user_id'];

$sql = "DELETE FROM tasks WHERE id=$id AND user_id=$user_id";
mysqli_query($conn, $sql);

echo "success";


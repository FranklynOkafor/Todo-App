<?php
include "db.php";

$id = $_POST['id'];

$sql = "DELETE FROM tasks WHERE id = $id";
mysqli_query($conn, $sql);

echo "success";

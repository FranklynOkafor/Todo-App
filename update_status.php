<?php
  include 'db.php';

  $id = $_POST['id'];
  $status = $_POST['completed'];

  $sql = "UPDATE tasks SET completed = $status WHERE id = $id";
  mysqli_query($conn, $sql);

  echo 'Success';
?>
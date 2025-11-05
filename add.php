<?php

  include 'db.php';
  $task = $_POST['task'];

  if (!empty ($task)) {
    $sql = "INSERT INTO tasks (task_name) VALUE ('$task')";
    mysqli_query($conn, $sql);
  }

  header('Location: index.php');
  exit();
?>
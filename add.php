<?php
  session_start();
  include 'db.php';
  $task = $_POST['task'];
  $user_id = $_SESSION['user_id'];

  if (!empty ($task)) {
    $sql = "INSERT INTO tasks (task_name, user_id) VALUES ('$task', '$user_id')";
    mysqli_query($conn, $sql);
  }

  header('Location: index.php');
  exit();
?>
<?php

  $hostname = 'localhost';
  $username = 'root';
  $password = '';
  $db_name = 'todo';


  $conn = mysqli_connect($hostname, $username, $password, $db_name);

  if (!$conn) {
    die('Database connection not successful'. mysqli_connect_error());
  }

?>
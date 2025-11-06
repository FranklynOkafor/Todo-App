<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>

<body class="register-body">
  <form action="register.php" method="post" class="form-box">
    <h2>Create an Account</h2>

    <input type="text" name="username" placeholder="Username" required>

    <input type="password" name="password" placeholder="Password" required>

    <input type="submit" value="Register">

    <p>Already have an account? <a href="login.php">Login</a></p>
  </form>
</body>
</html>


<?php
include "db.php"; // your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate input
    if (empty($username) || empty($password)) {
        die("All fields are required.");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if username exists
    $check = mysqli_query($conn, "SELECT id FROM users WHERE username='$username'");
    if (mysqli_num_rows($check) > 0) {
        die("Username already taken.");
    }

    // Insert into database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
        header("Location: login.php"); // redirect to login page
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>

<body class="login-body">
  <form action="login.php" method="post" class="form-box">
    <input type="text" name="username" placeholder="Username" required>
    <input type="text" name="password" placeholder="Password" required>

    <input type="submit" value="Login">
    <p>Don't have an account? <a href="register.php">Sign Up</a></p>


  </form>
  <?php
  session_start();
  include 'db.php';
  

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
      // Verify user's password
      if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        header('Location: index.php');
        exit();
      }
      'Wrong Password';
    }
    'User not found';
  }


  ?>
  <script src="scripts.js"></script>
</body>

</html>
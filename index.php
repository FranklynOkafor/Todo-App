<?php
session_start();
include 'db.php';




if (!$_SESSION['user_id']) {
  header('Location: login.php');
  exit;
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tasks WHERE user_id = $user_id ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tasks</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>My tasks</h1>
  <!-- <button>Add new task</button> -->


  <form action="add.php" method="POST">
    <input type="text" name="task" placeholder="Enter new task" required>
    <button type="submit">Add</button>
  </form>
  <br>
  <?php
  if (mysqli_num_rows($result) > 0) { ?>
    <div id="task_list">
      <table border="1" width='60%' cellpadding="10" cellspacing="0">
        <!-- <tr>
          <th>Done</th>
          <th>Task</th>
          <th>Delete</th>
        </tr> -->

        <?php
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr id="task-<?= $row['id']; ?>">
            <td align="center">
              <input type="checkbox"
                class="task_check"
                data-id='<?= $row['id']; ?>'
                <?= $row['completed'] ? 'checked' : '' ?>>
            </td>
            <td align="center">
              <p><?= htmlspecialchars($row['task_name']) ?></p>
            </td>

            <td align="center">
              <button
                class="delete-btn"
                data-id='<?= $row['id']; ?>'>Delete</button>
            </td>
          </tr>




        <?php }
        ?>
      </table>
    </div>
  <?php }
  ?>

  <a href="logout.php">Logout</a>
  <script src="scripts.js"></script>
</body>

</html>
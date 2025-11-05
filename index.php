<?php
include 'db.php';

$sql = "SELECT * FROM tasks ORDER BY created_at DESC";
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
        <tr>
          <th>Done</th>
          <th>Task</th>
          <th>Delete</th>
        </tr>

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


  <script src="scripts.js"></script>
</body>

</html>
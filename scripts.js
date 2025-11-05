document.querySelectorAll(".task_check").forEach((check) => {
  check.addEventListener("change", function () {
    let task_id = this.dataset.id;
    let status = this.checked ? 1 : 0;

    fetch("update_status.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: `id=${task_id}&completed=${status}`,
    });
    alert("Nogoing back");
  });
});


// Delete Task
document.querySelectorAll(".delete-btn").forEach((button) => {
  button.addEventListener("click", function () {
    let taskId = this.dataset.id;

    fetch("delete.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: `id=${taskId}`,
    })
      .then((response) => response.text())
      .then((data) => {
        if (data === "success") {
          document.getElementById("task-" + taskId).remove();
        }
      });
  });
});

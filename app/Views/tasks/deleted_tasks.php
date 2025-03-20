<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleted Tasks</title>
</head>
<body>
<nav >
  <div >
    <div >
      <div >
        <a class="nav-link active" aria-current="page" href="<?= base_url('dashboard') ?>">Home</a>
        <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
      </div>
    </div>
  </div>
</nav>
<div>
    <h1>Deleted Tasks</h1>
    <table >
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Deleted At</th>
            </tr>
        </thead>
        <tbody id = "table">
            <?php foreach ($deleted_tasks as $task): ?>
                <tr>
                    <td><?= esc($task['title']) ?></td>
                    <td><?= esc($task['description']) ?></td>
                    <td><?= esc($task['deleted_at']) ?></td>
                </tr>
            <?php endforeach; ?>
            <button onclick="deleteAll()">Clear History</button>
        </tbody>
    </table>
</div>

<script>
function deleteAll() {
    if (!confirm("Are you sure you want to delete all tasks?")) return;
    fetch('<?= base_url('tasks/delete_all') ?>', {
        method: "DELETE",  
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": "<?= csrf_hash() ?>" 
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {

            document.getElementById("table").remove();
            alert(data.message); 
        } else {
            alert("Error deleting tasks: " + data.message);
        }
    })
    .catch(error => console.error("Error:", error));
}
</script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
   
</head>
<body>

<div >
    <div >
        <h4 >Dashboard</h4>
        <ul >
            <div >
            <li >
                <a href="<?= base_url('tasks/create') ?>">Create Task</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('tasks/completed_tasks') ?>">Completed Tasks</a>
            </li>
            </div>
            <div >
            <li >
                <a  href="<?= base_url('logout') ?>">Logout</a>
            </li> 
            </div>
        </ul>
    </div>
    <div >
        <h1>Welcome to Your Dashboard</h1>

        <h2>Your Tasks</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                <tr id="task-<?= esc($task['id']) ?>">
                    <td><?= esc($task['title']) ?></td>
                    <td><?= esc($task['description']) ?></td>
                    <td><?= esc($task['due_date']) ?></td>
                    <td>
                        <a href="<?= base_url('tasks/edit/' . $task['id']) ?>">Edit</a> 
                        <button onclick="completeTask(<?= $task['id'] ?>)" >Complete</button> 
                        <button onclick="deleteTask(<?= $task['id'] ?>)" >Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function deleteTask(taskId) {
    if (!confirm("Are you sure you want to delete this task?")) return;


    fetch(`<?= base_url('tasks/delete/') ?>${taskId}`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest",
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById(`task-${taskId}`).remove();
            alert(data.message);
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error("Error:", error));
}
</script>
</body>
</html>
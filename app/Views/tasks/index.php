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
            <li >
                <a class="nav-link" href="<?= base_url('tasks/completed_tasks') ?>">Completed Tasks</a>
            </li>
            <li >
                <a class="nav-link" href="<?= base_url('tasks/deleted_tasks') ?>">Deleted Tasks</a>
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
                       <button onclick= "document.location='tasks/edit/'">Edit</button>
                        <button onclick="completeTask(<?= $task['id'] ?>)">Complete</button> 
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


function completeTask(id) {

confetti({
particleCount: 100,
spread: 70,
origin: { y: 0.6 },
});
fetch(`<?= base_url('tasks/complete/')?>${id}`, {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest' 
    }
})
.then(response => response.json())
.then(data => {
    if (data.success) {
        document.getElementById(`task-${id}`).remove();
    } else {
        alert(data.message);
    }
})
.catch(error => console.error('Error:', error));
}
</script>
<script src="https://cdn.jsdelivr.net/npm/@tsparticles/confetti@3.0.3/tsparticles.confetti.bundle.min.js"></script>
</body>
</html>
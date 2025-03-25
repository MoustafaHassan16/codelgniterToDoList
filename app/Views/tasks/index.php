<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="<?= base_url('css/dashbaord.css') ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
</head>
<body>



<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('tasks/create') ?>">Create Task</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('tasks/completed_tasks') ?>">Completed Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('tasks/deleted_tasks') ?>">Deleted Tasks</a>
                </li>
                <li class="nav-item">
                    <a id="out" class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="d-flex">
    <div class="dashboard-sidebar p-3">
        <h4 class="text-white">Dashboard</h4>
        <ul class="nav flex-column">
            <div class="tasks">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('tasks/create') ?>">Create Task</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="<?= base_url('tasks/deleted_tasks') ?>">Deleted Tasks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('tasks/completed_tasks') ?>">Completed Tasks</a>
            </li>
            </div>
            <div class="logout">
            <li class="nav-item">
            <button class="btn btn-outline-danger" type="button" class="button-85"  onclick= "document.location='login'">Log out</button>
            </li> 
            </div>
        </ul>
    </div>
     
    <div class="container-sm">
        <h2 class="title">Your Tasks</h2>
        <table class="table table-hover">
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
                        <a id="margs" href="<?= base_url('tasks/edit/' . $task['id']) ?>" class="btn btn-warning">Edit</a>
                        <button id="margs" class="btn btn-success" onclick="completeTask(<?= $task['id'] ?>)">Complete</button> 
                        <button id="margs" class="btn btn-danger" onclick="deleteTask(<?= $task['id'] ?>)" >Delete</button>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
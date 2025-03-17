<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
</head>
<body>
    <h1>Create a New Task</h1>
    <a href="<?= base_url('dashboard') ?>">Back to Dashboard</a>
    
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

<form id="taskForm">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required><br><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description"></textarea><br><br>

    <label for="due_date">Due Date:</label>
    <input type="date" id="due_date" name="due_date" required><br><br>

    <button type="submit">Create Task</button>
</form>
<!-- ========================================================================================================================= -->
<script>
document.getElementById("taskForm").addEventListener("submit", function(event) {
    event.preventDefault();

    let formData = {
        title: document.getElementById("title").value,
        description: document.getElementById("description").value,
        due_date: document.getElementById("due_date").value,
    };

    fetch("store", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Task created successfully!");
        } else {
            alert("Error creating task.");
        }
    })
    .catch(error => console.error("Error:", error));
});
</script>
<!-- ====================================================================================================================== -->
</body>
</html>
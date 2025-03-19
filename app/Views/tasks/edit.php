<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
    <h2>Edit Task</h2>
    <form action="<?= base_url('tasks/update/' . $task['id']) ?>" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?= esc($task['title']) ?>" required>
        
        <label for="description">Description:</label>
        <textarea name="description" id="description" required><?= esc($task['description']) ?></textarea>
        
        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" id="due_date" value="<?= esc($task['due_date']) ?>" required>
                
        <button type="submit">Update Task</button>
        <a href="<?= base_url('dashboard') ?>">Back to Dashboard</a>
    </form>
</body>
</html>
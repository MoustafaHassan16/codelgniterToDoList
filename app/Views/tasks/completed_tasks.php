<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Tasks</title>
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
    <h1>Completed Tasks</h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Deleted At</th>
            </tr>
        </thead>
        <tbody id= "table">
            <?php foreach ($completed_tasks as $task): ?>
                <tr>
                    <td><?= esc($task['title']) ?></td>
                    <td><?= esc($task['description']) ?></td>
                    <td><?= esc($task['completed_time']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
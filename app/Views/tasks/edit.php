<script src="https://kit.fontawesome.com/881cf5052a.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?= base_url('css/edit.css') ?>">

<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('dashboard') ?>">Dashboard</a>
    <i class="fa-solid fa-house-user"></i>
  </div>
</nav>

<div class="container-lg">
<div class="cardstyle">
<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
   <form class="adjust" action="<?= base_url('tasks/update/' . $task['id']) ?>" method="post">
     <div class="form-group ">
      <label class="control-label " for="name">
       Title
      </label>
      <input  class="form-control" type="text" name="title" id="title" placeholder="Enter title" value="<?= esc($task['title']) ?>" required>
     </div>
     <div class="form-group ">
      <label class="control-label " for="textarea">
       Description
      </label>
      <textarea class="form-control" name="description" id="description" placeholder="Enter description" required><?= esc($task['description']) ?></textarea>
     </div>
     <div class="form-group ">
      <label class="control-label " for="date">
       Date
      </label>
      <div class="input-group">

        <input class="form-control" type="date" name="due_date" id="due_date" value="<?= esc($task['due_date']) ?>">
      </div>
     </div>
     <div class="form-group">
      <div>
       <button class="btn btn-primary " name="submit" type="submit">
        Submit
       </button>
        </div>
       </div>
      </form>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
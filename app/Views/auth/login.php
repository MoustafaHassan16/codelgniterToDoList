<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-attachment: fixed;
            background-image: url('<?php echo base_url("public/img.avif"); ?>');
            background-repeat: no-repeat;
            background-size: cover; /* This ensures the image covers the whole screen */
        }
    </style>
    <title>Log-In</title>
</head>
<header>
    <div id="alert" class="alert alert-danger" role="alert" style="display: none;">Wrong Email or Password</div>
</header>
<body>
<div class="container-sm">
<div class="control">
<div class="cardstyle">
<h5 class="card-title text-center" style="color:white; font-weight:bold;">Login</h5>
<form id="loginForm">
    <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
    <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
    <button  class="btn btn-primary" type="submit">Login</button>
</form>
<span class="span-text">Don't have an account? <button type="button" class="button-85"  onclick= "document.location='register'">Register</button>
</div>
</div>
</div>





<Script>
document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault(); 

    let emailField = document.getElementById("email");
    let passwordField = document.getElementById("password");
    let alertmessage = document.getElementById("alert")
   
    let formData = new FormData(this);

    fetch('<?= base_url('login') ?>',  {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            window.location.href = data.redirect;
        } else {
            
            emailField.style.border = "2px solid red";
            passwordField.style.border = "2px solid red";
            alertmessage.style.display="block";

            setTimeout(() => {
                alertmessage.style.display = "none";
                emailField.style.border= "1px solid black";
                passwordField.style.border= "1px solid black";
            }, 3000);
        }
    })
    .catch(error => console.error("Error:", error));
});
</Script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
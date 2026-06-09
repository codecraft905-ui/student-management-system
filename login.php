<?php
session_start();
include("includes/db.php");

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

$q = mysqli_query($conn,
"SELECT * FROM users WHERE username='$username' AND password='$password'");

if(mysqli_num_rows($q) == 1){
$_SESSION['user'] = $username;
header("Location: index.php");
}else{
$error = "Invalid login";
}
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 col-md-4">

<h3 class="text-center">Login</h3>

<form method="POST">

<input name="username" class="form-control mb-2" placeholder="Username">

<input name="password" type="password" class="form-control mb-2" placeholder="Password">

<button name="login" class="btn btn-primary w-100">Login</button>

</form>

<p class="text-danger"><?= $error ?? '' ?></p>

</div>
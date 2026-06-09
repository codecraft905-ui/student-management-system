<?php
include("includes/db.php");

if(isset($_POST['save'])){

mysqli_query($conn,
"INSERT INTO students(name,email,course,phone)
VALUES('$_POST[name]','$_POST[email]','$_POST[course]','$_POST[phone]')");

header("Location: index.php");
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4 col-md-6">

<h3>Add Student</h3>

<form method="POST">

<input name="name" class="form-control mb-2" placeholder="Name">
<input name="email" class="form-control mb-2" placeholder="Email">
<input name="course" class="form-control mb-2" placeholder="Course">
<input name="phone" class="form-control mb-2" placeholder="Phone">

<button name="save" class="btn btn-success">Save</button>

</form>

</div>
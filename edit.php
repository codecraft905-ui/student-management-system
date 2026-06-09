<?php
include("includes/db.php");

$id = $_GET['id'];

$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM students WHERE id=$id"));

if(isset($_POST['update'])){

mysqli_query($conn,
"UPDATE students SET
name='$_POST[name]',
email='$_POST[email]',
course='$_POST[course]',
phone='$_POST[phone]'
WHERE id=$id");

header("Location: index.php");
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4 col-md-6">

<h3>Edit Student</h3>

<form method="POST">

<input name="name" value="<?= $row['name'] ?>" class="form-control mb-2">
<input name="email" value="<?= $row['email'] ?>" class="form-control mb-2">
<input name="course" value="<?= $row['course'] ?>" class="form-control mb-2">
<input name="phone" value="<?= $row['phone'] ?>" class="form-control mb-2">

<button name="update" class="btn btn-warning">Update</button>

</form>

</div>
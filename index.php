<?php
session_start();
if(!isset($_SESSION['user'])){
header("Location: login.php");
exit;
}
?>
<?php
include("includes/db.php");

$search = $_GET['search'] ?? '';

if($search){
$result = mysqli_query($conn,
"SELECT * FROM students
WHERE name LIKE '%$search%'
OR email LIKE '%$search%'");
}else{
$result = mysqli_query($conn,"SELECT * FROM students");
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">

<div class="d-flex justify-content-between align-items-center">
<h3>Student Dashboard</h3>
<a href="logout.php" class="btn btn-dark btn-sm">Logout</a>
</div>

<form class="mt-3">
<input name="search" class="form-control" placeholder="Search students...">
</form>

<a href="create.php" class="btn btn-success mt-3">+ Add Student</a>

<table class="table table-striped mt-3">
<tr>
<th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Phone</th><th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['name'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['course'] ?></td>
<td><?= $row['phone'] ?></td>
<td>
<a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
</td>
</tr>
<?php } ?>

</table>

</div>
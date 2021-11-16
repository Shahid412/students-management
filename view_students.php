<?php
require_once "connect.php";

if(isset($_GET['submit'])){
	$query = mysqli_real_escape_string($con, htmlspecialchars($_GET['query']));
	$result = mysqli_query($con, "SELECT * FROM stds where student_name LIKE '%$query%'");
}
else {$result = mysqli_query($con, "SELECT * FROM stds");}
?>

<style>
</style>


<html>
<head>
	<title>Students - Student Management System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div class="container">
<br />
<center>
<div class="feed-container">
<h1>Students</h1>
<div class="menu-items">
<a href="index.php">Home</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="add_student.php">Add Student</a>
</div>
<div class="search-bar">
<form method="get" action="">
<input type="text" name="query" placeholder="Search Student Name...">
<input type="submit" class="submit" name="submit" Value="Search">
</form>
</div>
<div class="data-items">
<table>
<thead>
<th>Student ID</th>
<th>Student Name</th>
<th>Sex</th>
<th>Address</th>
<th>Contact</th>
<th>Operation</th>
</thead>
<tbody>

<?php 
while($row = mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $row['student_id']; ?></td>
<td><?php echo $row['student_name'];?></td>
<td><?php echo $row['sex'];?></td>
<td><?php echo $row['address'];?></td>
<td><?php echo $row['contact'];?></td>
<td>
<a href="edit_student.php?id=<?php echo $row['student_id'];?>">Edit/Update</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a href="remove_student.php?id=<?php echo $row['student_id'];?>">Remove</a>
</td>

</div>
</div>
<?php 
}
?>
</tbody>
</table>
</div>
</center>
</body>
</html>
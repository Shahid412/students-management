<?php
require_once "connect.php";

if(isset($_GET['submit'])){
	$query = mysqli_real_escape_string($con, htmlspecialchars($_GET['query']));
	$result = mysqli_query($con, "SELECT * FROM courses where c_name LIKE '%$query%'");
}
else {$result = mysqli_query($con, "SELECT * FROM courses");}
?>
<style>

</style>

<html>
<head>
	<title>Courses - SMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<br />
<center>
<div class="feed-container">
<h1>Courses</h1>
<div class="menu-items">
<a href="index.php">Home</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="add_course.php">Add New</a>
</div>
<div class="search-bar">
<form method="get" action="">
<input type="text" name="query" placeholder="Search Course Name...">
<input type="submit" class="submit" name="submit" Value="Search">
</form>
</div>
<div class="data-items">
<table>
<thead>
<th>Course ID</th>
<th>Course Name</th>
<th>Tutoe Name</th>
<th>Qualification</th>
<th>Experience</th>
<th>Actions</th>
</thead>
<tbody>

<?php 
while($row = mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $row['course_id']; ?></td>
<td><?php echo $row['c_name'];?></td>
<td><?php echo $row['tutor'];?></td>
<td><?php echo $row['qualification'];?></td>
<td><?php echo $row['experience'];?></td>
<td>
<a href="edit_course.php?id=<?php echo $row['course_id'];?>">Edit/Update</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a href="remove_course.php?id=<?php echo $row['course_id'];?>">Remove</a>
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
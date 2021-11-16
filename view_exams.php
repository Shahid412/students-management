<?php
require_once "connect.php";

if(isset($_GET['submit'])){
	$query = mysqli_real_escape_string($con, htmlspecialchars($_GET['query']));
	
	$result = mysqli_query($con, "SELECT e.exam_id, s.student_name, c.c_name, d.dept_name , e.marks
	FROM exams e 
	INNER JOIN courses c 
	ON e.course_id=c.course_id
	INNER JOIN depts d
	ON e.dept_id=d.dept_id
	INNER JOIN stds s
	ON e.student_id=s.student_id 
	WHERE s.student_name LIKE '%$query%'"
	);
} else {
	$result = mysqli_query($con, "SELECT e.exam_id, s.student_name, c.c_name, d.dept_name , e.marks
	FROM exams e
	INNER JOIN courses c 
	ON e.course_id=c.course_id
	INNER JOIN depts d
	ON e.dept_id=d.dept_id
	INNER JOIN stds s
	ON e.student_id=s.student_id");
}
?>
<style>
</style>


<html>
<head>
	<title>Exams - SMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<br />
<center>
<div class="feed-container">
<h1>Exams</h1>
<div class="menu-items">
<a href="index.php">Home</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="add_exam.php">Add New</a>

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
<th>Exam ID</th>
<th>Student Name</th>
<th>Course Name</th>
<th>Department Name</th>
<th>Marks</th>
<th>Actions</th>
</thead>
<tbody>

<?php 
while($row = mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $row['exam_id']; ?></td>
<td><?php echo $row['student_name']; ?></td>
<td><?php echo $row['c_name'];?></td>
<td><?php echo $row['dept_name'];?></td>
<td><?php echo $row['marks'];?></td>
<td>
<a href="edit_exam.php?id=<?php echo $row['exam_id'];?>">Edit/Update</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a href="remove_exam.php?id=<?php echo $row['exam_id'];?>">Remove</a>
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
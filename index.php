<?php
require_once "connect.php";

$enrolls = mysqli_query($con, "SELECT e.enrol_id, s.student_name, c.c_name, d.dept_name, e.dated, e.description
	FROM enrollments e 
	INNER JOIN courses c 
	ON e.course_id=c.course_id
	INNER JOIN depts d
	ON e.dept_id=d.dept_id
	INNER JOIN stds s
	ON e.student_id=s.student_id");

$exams = mysqli_query($con, "SELECT e.exam_id, s.student_id, s.student_name, c.c_name, d.dept_name , e.marks
	FROM exams e
	INNER JOIN courses c 
	ON e.course_id=c.course_id
	INNER JOIN depts d
	ON e.dept_id=d.dept_id
	INNER JOIN stds s
	ON e.student_id=s.student_id");

$fees = mysqli_query($con, "SELECT stds.student_name, fees.receipt_no, fees.dated, fees.tution_fee
	FROM stds
	INNER JOIN fees 
	ON stds.student_id=fees.student_id");

$stds = mysqli_query($con, "SELECT * FROM stds");

$depts = mysqli_query($con, "SELECT * FROM depts");

$courses = mysqli_query($con, "SELECT * FROM courses");

$admins = mysqli_query($con, "SELECT * FROM admins");

?>
<html>
<link rel="stylesheet" href="css/style.css">
<head>
	<title>SMS - Student Management System</title>
</head>
<body>
<center>
<div class="container">
<br />
<center>
<div class="header-text">
<h1>SMS - Student Management System</h1>
<br />

<p>
<a href="add_select_item.php">Add</a>
<a href="view_select_item.php">View</a>
<a href="edit_select_item.php">Edit/Update</a>
<a href="remove_select_item.php">Remove</a>
</p>
</div>
</center>

<div class="content">

<div class="table-data">
<h3>Enrollments</h3>
<table>
<thead>
<th>Enrollment ID</th>
<th>Student Name</th>
<th>Course Name</th>
<th>Department Name</th>
<th>Date</th>
<th>Description</th>
<th>Actions</th>
</thead>
<tbody>
<?php 
while($row = mysqli_fetch_array($enrolls)){
?>
<tr>
<td><?php echo $row['enrol_id']; ?></td>
<td><?php echo $row['student_name']; ?></td>
<td><?php echo $row['c_name'];?></td>
<td><?php echo $row['dept_name'];?></td>
<td><?php echo $row['dated'];?></td>
<td><?php echo $row['description'];?></td>
<td>
<a href="edit_enrol.php?id=<?php echo $row['enrol_id'];?>">Edit/Update</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a href="remove_enrol.php?id=<?php echo $row['enrol_id'];?>">Remove</a>
</td>
</div>
</div>
<?php 
}
?>
</tbody>
</table>
</div>

<div class="table-data">
<h3>Exams</h3>
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
while($row = mysqli_fetch_array($exams)){
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

<div class="table-data">
<table>
<div class="data-items">
<h3>Departments</h3>
<table>
<thead>
<th>Department ID</th>
<th>Department Name</th>
<th>Department Head</th>
<th>Actions</th>
</thead>
<tbody>
<?php 
while($row = mysqli_fetch_array($depts)){
?>
<tr>
<td><?php echo $row['dept_id']; ?></td>
<td><?php echo $row['dept_name'];?></td>
<td><?php echo $row['dept_head'];?></td>
<td>
<a href="edit_dept.php?id=<?php echo $row['dept_id'];?>">Edit/Update</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a href="remove_dept.php?id=<?php echo $row['dept_id'];?>">Remove</a>
</td>
</div>
</div>
<?php 
}
?>
</tbody>
</table>
</div>

<div class="table-data">
<h3>Fees</h3>
<table>
<thead>
<th>Receipt No.</th>
<th>Student Name</th>
<th>Date</th>
<th>Tution Fee</th>
<th>Actions</th>
</thead>
<tbody>
<?php 
while($row = mysqli_fetch_array($fees)){
?>
<tr>
<td><?php echo $row['receipt_no'];?></td>
<td><?php echo $row['student_name']; ?></td>
<td><?php echo $row['dated'];?></td>
<td><?php echo $row['tution_fee'];?></td>
<td>
<a href="edit_fee.php?id=<?php echo $row['receipt_no'];?>">Edit/Update</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a href="remove_fee.php?id=<?php echo $row['receipt_no'];?>">Remove</a>
</td>
</div>
</div>
<?php 
}
?>
</tbody>
</table>
</div>

<div class="table-data">
<h3>Students</h3>
<table>
<thead>
<th>Student ID</th>
<th>Student Name</th>
<th>Sex</th>
<th>Address</th>
<th>Phone</th>
<th>Actions</th>
</thead>
<tbody>
<?php 
while($row = mysqli_fetch_array($stds)){
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

<div class="table-data">
<h3>Courses</h3>
<table>
<thead>
<th>Course ID</th>
<th>Course Name</th>
<th>Tutor Name</th>
<th>Qualification</th>
<th>Experience</th>
<th>Actions</th>
</thead>
<tbody>

<?php 
while($row = mysqli_fetch_array($courses)){
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
<div class="table-data">
<h3>Administrators</h3>
<table>
<thead>
<th>Admin ID</th>
<th>Admin Name</th>
<th>Sex</th>
<th>Password</th>
<th>Actions</th>
</thead>
<tbody>
<?php 
while($row = mysqli_fetch_array($admins)){
?>
<tr>
<td><?php echo $row['admin_id']; ?></td>
<td><?php echo $row['admin_name'];?></td>
<td><?php echo $row['sex'];?></td>
<td><?php echo $row['password'];?></td>
<td>
<a href="edit_admin.php?id=<?php echo $row['admin_id'];?>">Edit/Update</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a href="remove_admin.php?id=<?php echo $row['admin_id'];?>">Remove</a>
</td>
<?php 
}
?>
</tbody>
</table>
</div>
</div>
</div>
</center>
</body>

<script>
</script>

</html>
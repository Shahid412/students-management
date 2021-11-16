<center>
<?php
require_once "connect.php";

if(isset($_POST['submit'])){
	$sname = mysqli_real_escape_string($con, htmlspecialchars($_POST['sname']));
	$cname = mysqli_real_escape_string($con, htmlspecialchars($_POST['cname']));
	$dname = mysqli_real_escape_string($con, htmlspecialchars($_POST['dname']));

	$marks = mysqli_real_escape_string($con, htmlspecialchars($_POST['marks']));

	$stds = mysqli_query($con, "SELECT * FROM stds where student_name='$sname'");
	$std_row = mysqli_fetch_assoc($stds);
	$std_id=$std_row['student_id'];

	$courses = mysqli_query($con, "SELECT * FROM courses where c_name='$cname'");
	$course_row = mysqli_fetch_assoc($courses);
	$c_id=$course_row['course_id'];
	
	$depts = mysqli_query($con, "SELECT * FROM depts where dept_name='$dname'");
	$dept_row = mysqli_fetch_assoc($depts);
	$dept_id=$dept_row['dept_id'];
	
	$exams=mysqli_query($con, "select * from exams");
	while($row = mysqli_fetch_array($exams)){$id= $row['exam_id'];}
	$id+=1;

	$sql="insert ignore into exams 
	(exam_id, student_id, course_id, dept_id, marks) 
	values
	('$id','$std_id','$c_id','$dept_id','$marks')";
	if ($con -> query($sql)==TRUE){
		echo "Upload Success";
	} else echo "Failed to upload!" . $con->error;
}else echo "Please input data!";
?>
<html>
<head>
	<title>Exams - SMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<center>
<div class="header-text">
</div>
<br />
<a href="add_exam.php">Add</a><br /><br />
<a href="view_exams.php">View Exams</a><br /><br />
<a href="index.php">Home</a>
</body>
</html>
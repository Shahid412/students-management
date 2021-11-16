<center>
<?php
require_once "connect.php";

if(isset($_POST['submit']) && !empty($_POST['name'])){
	$name = mysqli_real_escape_string($con, htmlspecialchars($_POST['name']));
	$tutor = mysqli_real_escape_string($con, htmlspecialchars($_POST['tutor']));
	$qual = mysqli_real_escape_string($con, htmlspecialchars($_POST['qual']));
	$exp = mysqli_real_escape_string($con, htmlspecialchars($_POST['exp']));

	$name=str_replace("'","\'",$name);
	$sql="insert ignore into courses 
	(course_id, c_name, tutor, qualification,experience) 
	values 
	('','$name','$tutor','$qual','$exp')";
	if ($con -> query($sql)==TRUE){
		echo "Upload Success";
	} else echo "Failed to upload!" . $con->error;
}else echo "Please input data!";
?>

<html>
<head>
	<title>Courses - SMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<center>
<div class="header-text">
</div>
<br />
<a href="add_course.php">Add Another</a><br /><br />
<a href="view_courses.php">View Courses</a><br /><br />
<a href="index.php">Home</a>

</body>
</html>

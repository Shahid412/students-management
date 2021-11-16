<center>
<?php
require_once "connect.php";

if(isset($_POST['submit']) && !empty($_POST['name'])){
	$name = mysqli_real_escape_string($con, htmlspecialchars($_POST['name']));
	$sex = mysqli_real_escape_string($con, htmlspecialchars($_POST['sex']));
	$address = mysqli_real_escape_string($con, htmlspecialchars($_POST['address']));
	$contact = mysqli_real_escape_string($con, htmlspecialchars($_POST['contact']));

	$name=str_replace("'","\'",$name);
	$address=str_replace("'","\'",$address);
	$contact=str_replace("'","\'",$contact);
	$sql="insert ignore into stds 
	(student_id, student_name, sex, address, contact) 
	values
	('','$name','$sex','$address','$contact')";
	if ($con -> query($sql)==TRUE){
		echo "Upload Success";
	} else echo "Failed to upload!" . $con->error;
}else echo "Please input data!";
?>



<html>
<head>
	<title>Students - SMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<center>
<div class="header-text">
</div>
<br />
<a href="add_student.php">Add</a><br /><br />
<a href="view_students.php">View Students</a><br /><br />
<a href="index.php">Home</a>

</body>
</html>

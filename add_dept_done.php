<center>
<?php
require_once "connect.php";

if(isset($_POST['submit']) && !empty($_POST['name'])){
	$name = mysqli_real_escape_string($con, htmlspecialchars($_POST['name']));
	$head = mysqli_real_escape_string($con, htmlspecialchars($_POST['head']));

	$name=str_replace("'","\'",$name);
	$sql="insert ignore into depts 
	(dept_id, dept_name,dept_head) 
	values 
	('','$name','$head')";
	if ($con -> query($sql)==TRUE){
		echo "Upload Success";
	} else echo "Failed to upload!" . $con->error;
} else echo "Please input data!";
?>



<html>
<head>
	<title>Depts - SMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div class="header-text">
</div>
<br />
<a href="add_dept.php">Add</a><br /><br />
<a href="view_depts.php">View Departments</a><br /><br />
<a href="index.php">Home</a>

</body>
</html>
</center>
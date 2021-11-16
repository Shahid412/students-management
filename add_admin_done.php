<center>
<?php
require_once "connect.php";

if(isset($_POST['submit']) && !empty($_POST['name'])){
	$name = mysqli_real_escape_string($con, htmlspecialchars($_POST['name']));
	$password = mysqli_real_escape_string($con, htmlspecialchars($_POST['password']));
	$sex = mysqli_real_escape_string($con, htmlspecialchars($_POST['sex']));

	$name=str_replace("'","\'",$name);
	$sql="insert ignore into admins
	(admin_id, admin_name, sex, password) 
	values 
	('','$name', '$sex', '$password')";
	if ($con -> query($sql)==TRUE){
		echo "Upload Success";
	} else echo "Failed to upload!" . $con->error;
}else echo "Please input data!";
?>

<html>
<head>
	<title>Admins - SMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<center>
<div class="header-text">
</div>
<br />
<a href="add_admin.php">Add Another</a><br /><br />
<a href="view_admins.php">View Admins</a><br /><br />
<a href="index.php">Home</a>

</body>
</html>

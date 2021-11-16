<center>
<?php
require_once "connect.php";

if(isset($_POST['submit'])){
	$sname = mysqli_real_escape_string($con, htmlspecialchars($_POST['sname']));
	$date = mysqli_real_escape_string($con, htmlspecialchars($_POST['date']));

	$fee = mysqli_real_escape_string($con, htmlspecialchars($_POST['fee']));

	$stds = mysqli_query($con, "SELECT * FROM stds where student_name='$sname'");
	$std_row = mysqli_fetch_assoc($stds);
	$std_id=$std_row['student_id'];
	
	$sql="insert ignore into fees 
	(receipt_no, student_id, dated, tution_fee) 
	values
	('','$std_id','$date','$fee')";
	if ($con -> query($sql)==TRUE){
		echo "Upload Success";
	} else echo "Failed to upload!" . $con->error;
}else echo "Please input data!";
?>
<html>
<head>
	<title>Fees - SMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<center>
<div class="header-text">
</div>
<br />
<a href="add_fee.php">Add</a><br /><br />
<a href="view_fees.php">View Fees</a><br /><br />
<a href="index.php">Home</a>
</body>
</html>
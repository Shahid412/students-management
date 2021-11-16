<?php
require_once "connect.php";
if (isset($_GET['id'])){
	$id = $_GET['id'];
	
	$query = "SELECT * from fees where receipt_no='".$id."'"; 
	$result = mysqli_query($con, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);
	
	$sid=$row['student_id'];
	
	$stds=mysqli_query($con, "select * from stds where student_id='$sid'");
	$std_row = mysqli_fetch_assoc($stds);
	$sname=$std_row['student_name'];

}
?>
<style>
</style>
<html>
<head>
	<title>Fees - SMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div class="container">
<br />
<center>
<div class="feed-container">
<h1>Fees</h1>
<div class="menu-items">
<a href="view_fees.php">Cancel</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="index.php">Home</a>
</div>
<?php
if(isset($_POST['submit'])){
	$receipt_no=$_POST['receipt_no'];
	$fee=$_POST['fee'];
	$date=$_POST['date'];
	$sname=$_POST['sname'];
	
	$stds=mysqli_query($con, "select * from stds where student_name='$sname'");
	$std_row = mysqli_fetch_assoc($stds);
	$sid=$std_row['student_id'];
	
	$update="update fees set student_id='$sid',
	dated='$date', tution_fee='$fee'
	where receipt_no='$receipt_no'";
	$result=mysqli_query($con, $update) or die(mysqli_error($con));
	if ($result){
		echo "Successfully Updated !";
		header("Location: view_fees.php"); 
	} 
	else {
		echo "<center><h1>.Record is referenced in some other table as a foreign key. Can't be deleted .</h1> >> ";
		echo $con->error();
	}

} else {
?>

<br /> <br />
<div class="data-items">
<form method="post" action="">
<br />
<input type="hidden" name="receipt_no" value="<?php echo $row['receipt_no']?>"> <br />
<input type="text" name="sname" value="<?php echo $sname; ?>" disabled> <br />
<input type="date" name="date" value="<?php echo $row['dated']?>"> <br />
<input type="number" name="fee" value="<?php echo $row['tution_fee']?>"> <br /> <br />
<input type="submit" class="submit" name="submit" Value="Update">
</form>
<?php } ?>
</div>
</center>
</body>
</html>
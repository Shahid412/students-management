<?php
require_once "connect.php";
if (isset($_GET['id'])){
	$id = $_GET['id'];
	
	$query = "SELECT * from exams where exam_id='".$id."'"; 
	$result = mysqli_query($con, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);
	
	$sid=$row['student_id'];
	$cid=$row['course_id'];
	$did=$row['dept_id'];
	
	$marks=$row['marks'];
	
	$stds=mysqli_query($con, "select * from stds where student_id='$sid'");
	$std_row = mysqli_fetch_assoc($stds);

	$courses=mysqli_query($con, "select * from courses where course_id='$cid'");
	$c_row = mysqli_fetch_assoc($courses);

	$depts=mysqli_query($con, "select * from depts where dept_id='$did'");
	$d_row = mysqli_fetch_assoc($depts);
	
}
?>



<style>
</style>
<html>
<head>
	<title>Exams - SMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div class="container">
<br />
<center>
<div class="feed-container">
<h1>Exams</h1>
<div class="menu-items">
<a href="view_exams.php">Cancel</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="index.php">Home</a>
</div>
<?php
if(isset($_POST['submit'])){
	$exam_id=$_POST['exam_id'];
	$marks=$_POST['marks'];
	
	$update="update exams set marks='$marks'
	where exam_id='$exam_id'";
	$result=mysqli_query($con, $update) or die(mysqli_error($con));
	if ($result){
		echo "Successfully Updated !";
		header("Location: view_exams.php"); 
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
<input type="hidden" name="exam_id" value="<?php echo $row['exam_id']?>"> <br />
<input type="text" name="std_name" value="<?php echo $std_row['student_name'];; ?>" disabled> <br />
<input type="text" name="crs_name" value="<?php echo $c_row['c_name'];; ?>" disabled> <br />
<input type="text" name="dept_name" value="<?php echo $d_row['dept_name'];; ?>" disabled> <br />
<input type="number" min='0' name="marks" value="<?php echo $row['marks']?>"> <br /> <br />
<input type="submit" class="submit" name="submit" Value="Update">
</form>
<?php } ?>
</div>
</center>
</body>
</html>
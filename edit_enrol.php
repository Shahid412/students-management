<?php
require_once "connect.php";
if (isset($_GET['id'])){
	$id = $_GET['id'];
	
	$query = "SELECT * from enrollments where enrol_id='".$id."'"; 
	$result = mysqli_query($con, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);
	
	$sid=$row['student_id'];
	$cid=$row['course_id'];
	$did=$row['dept_id'];
	
	$date=$row['dated'];
	$des=$row['description'];
	
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
	<title>Enrollments - SMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div class="container">
<br />
<center>
<div class="feed-container">
<h1>Enrollments</h1>
<div class="menu-items">
<a href="view_enrolls.php">Cancel</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="index.php">Home</a>
</div>
<?php
if(isset($_POST['submit'])){
	$id=$_POST['id'];
	$date=$_POST['date'];
	$des=$_POST['des'];
	
	$update="update enrollments set dated='$date',description='$des'
	where enrol_id='$id'";
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
<input type="hidden" name="id" value="<?php echo $row['enrol_id']?>"> <br />
<input type="text" name="std_name" value="<?php echo $std_row['student_name'];; ?>" disabled> <br />
<input type="text" name="crs_name" value="<?php echo $c_row['c_name'];; ?>" disabled> <br />
<input type="text" name="dept_name" value="<?php echo $d_row['dept_name'];; ?>" disabled> <br />
<input type="date" name="date" value="<?php echo $date;?>"> <br /> <br />
<input type="text" name="des" value="<?php echo $des;?>"> <br /> <br />
<input type="submit" class="submit" name="submit" Value="Update">
</form>
<?php } ?>
</div>
</center>
</body>
</html>
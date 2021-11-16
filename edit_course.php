<?php
require_once "connect.php";
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$query = "SELECT * from courses where course_id='".$id."'"; 
	$result = mysqli_query($con, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);	
}
?>



<style>
</style>
<html>
<head>
	<title>Courses - SMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div class="container">
<br />
<center>
<div class="feed-container">
<h1>Courses</h1>
<div class="menu-items">
<a href="view_courses.php">Cancel</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="index.php">Home</a>
</div>
<?php
if(isset($_POST['submit'])){
	$id=$_POST['id'];
	$cname=$_POST['c_name'];
	$tutor=$_POST['tutor'];
	$qual=$_POST['qual'];
	$exp=$_POST['exp'];
	
	$update="update courses set c_name='$cname', tutor='$tutor', qualification='$qual', experience='$exp'
	where course_id='$id'";
	$result=mysqli_query($con, $update) or die(mysqli_error($con));
	if ($result){
		echo "Successfully Updated !";
		header("Location: view_courses.php"); 
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
<input type="hidden" name="id" value="<?php echo $row['course_id'];?>"> <br />
<input type="text" name="c_name" value="<?php echo $row['c_name']; ?>"> <br />
<input type="text" name="tutor" value="<?php echo $row['tutor']; ?>"> <br />
<input type="text" name="qual" value="<?php echo $row['qualification']; ?>"> <br />
<input type="text" name="exp" value="<?php echo $row['experience']; ?>"> <br /> <br />
<input type="submit" class="submit" name="submit" Value="Update">
</form>
<?php } ?>
</div>
</center>
</body>
</html>
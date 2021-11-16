<?php
require_once "connect.php";
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$query = "SELECT * from stds where student_id='".$id."'"; 
	$result = mysqli_query($con, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);	
}
?>



<style>
</style>
<html>
<head>
	<title>Students - SMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div class="container">
<br />
<center>
<div class="feed-container">
<h1>Departments</h1>
<div class="menu-items">
<a href="view_students.php">Cancel</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="index.php">Home</a>
</div>
<?php
if(isset($_POST['submit'])){
	$id=$_POST['id'];
	$name=$_POST['name'];
	$sex=$_POST['sex'];
	$add=$_POST['add'];
	$ph=$_POST['phone'];
	
	$update="update stds set student_name='$name',sex='$sex',address='$add',contact='$ph'
	where student_id='$id'";
	$result=mysqli_query($con, $update) or die(mysqli_error($con));
	if ($result){
		echo "Successfully Updated !";
		header("Location: view_students.php"); 
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
<input type="hidden" name="id" value="<?php echo $row['student_id'];?>"> <br />
<input type="text" name="name" value="<?php echo $row['student_name']; ?>"> <br />
<input type="text" name="sex" value="<?php echo $row['sex']; ?>"> <br />
<input type="text" name="add" value="<?php echo $row['address']; ?>"> <br />
<input type="text" name="phone" value="<?php echo $row['contact']; ?>"> <br />
<input type="submit" class="submit" name="submit" Value="Update">
</form>
<?php } ?>
</div>
</center>
</body>
</html>
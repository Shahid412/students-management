<?php
require_once "connect.php";

if (isset($_GET['id'])){
	$id = $_GET['id'];
	
	$query = "DELETE FROM courses WHERE course_id=$id"; 
	$result = mysqli_query($con, $query) or die ( mysqli_error($con));
	if ($result){
		echo "Successfully Removed !";
		header("Location: view_courses.php"); 
	}
	else {
		echo "<center><h1>.Record is referenced in some other table as a foreign key. Can't be deleted .</h1> >> ";
		echo $con->error();
	}
}


?>



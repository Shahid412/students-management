<?php
require_once "connect.php";

if (isset($_GET['id'])){
	$id = $_GET['id'];
	
	$query = "DELETE FROM fees WHERE receipt_no=$id"; 
	$result = mysqli_query($con, $query) or die ( mysqli_error($con));
	if ($result){
		echo "Successfully Removed !";
		header("Location: view_fees.php");
	}
	else {
		echo "<center><h1>.Record is referenced in some other table as a foreign key. Can't be deleted .</h1> >> ";
		echo $con->error();
	}
}
?>



	 <?php
require_once "connect.php";
$stds=mysqli_query($con, "select * from stds");
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
 <br /> <br />
<div class="data-items">
<form method="post" action="add_fee_done.php">
<br />
<select name="sname" >
	<option>-- Select Student Name --</option>
	<?php 
	while($srow = mysqli_fetch_array($stds))
        {
            echo "<option name='sname' value='". $srow['student_name'] ."'>" .$srow['student_name'] ."</option>";
        }
	?>
</select>
<br />
<input type="date" name="date" > <br />
<input type="number" min='0' name="fee" placeholder="Tution Fee"> <br /> <br />
<input type="submit" class="submit" name="submit" Value="Add">
</form>
</div>
</center>
</body>
</html>
<?php
require_once "connect.php";
$stds=mysqli_query($con, "select * from stds");
$courses=mysqli_query($con, "select * from courses");
$depts=mysqli_query($con, "select * from depts");
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
 <br /> <br />
<div class="data-items">
<form method="post" action="add_exam_done.php">
<br />
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
<select name="cname" >
	<option>-- Select Course Name --</option>
	<?php 
	while($crow = mysqli_fetch_array($courses))
        {
            echo "<option name='cname' value='". $crow['c_name'] ."'>" .$crow['c_name'] ."</option>";
        }
	?>
</select>
<br />
<select name="dname" >
	<option>-- Select Department Name --</option>
	<?php 
	while($drow = mysqli_fetch_array($depts))
        {
            echo "<option name='dname' value='". $drow['dept_name'] ."'>" .$drow['dept_name'] ."</option>";
        }
	?>
</select>
<br />
<input type="number" min='0' name="marks" placeholder="Marks"> <br /> <br />
<input type="submit" class="submit" name="submit" Value="Add">
</form>
</div>
</center>
</body>
</html>
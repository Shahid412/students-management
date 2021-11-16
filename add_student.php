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
<h1>Students</h1>
<div class="menu-items">
<a href="view_students.php">Cancel</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="index.php">Home</a>
</div>
 <br /> <br />
<div class="data-items">
<form method="post" action="add_student_done.php">
<input type="text" name="name" placeholder="Student Name"> <br />
<select name="sex">
	<option value="F">Female</option>
	<option value="M">Male</option>
</select>
<br />
<input type="text" name="address" placeholder="Address"> <br />
<input type="text" name="contact" placeholder="Contact"> <br /> <br />
<input type="submit" class="submit" name="submit" Value="Add">
</form>
</div>
</center>
</body>
</html>
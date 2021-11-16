<style>
</style>


<html>
<head>
	<title>Admins - SMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div class="container">
<br />
<center>
<div class="feed-container">
<h1>Admins</h1>
<div class="menu-items">
<a href="view_admins.php">Cancel</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="index.php">Home</a>
</div>

 <br /> <br />
<div class="data-items">
<form method="post" action="add_admin_done.php">
<input type="text" name="name" placeholder="Admin Name"> <br />
<select name="sex">
	<option value="F">Female</option>
	<option value="M">Male</option>
</select>
<br />
<input type="text" name="password" placeholder="Password"> <br /> <br />
<input type="submit" class="submit" name="submit" Value="Add">
</form>
</div>
</center>
</body>
</html>
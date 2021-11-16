<?php
require_once "connect.php";

if(isset($_GET['submit'])){
	$query = mysqli_real_escape_string($con, htmlspecialchars($_GET['query']));
	$result = mysqli_query($con, "SELECT * FROM depts where dept_name LIKE '%$query%'");
}
else {$result = mysqli_query($con, "SELECT * FROM depts");}
?>
<style>
</style>

<html>
<head>
	<title>Depts - SMS</title>
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
<a href="index.php">Home</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="add_dept.php">Add New</a>
</div>
<div class="search-bar">
<form method="get" action="">
<input type="text" name="query" placeholder="Search Dept Name...">
<input type="submit" class="submit" name="submit" Value="Search">
</form>
</div>
<div class="data-items">
<table>
<thead>
<th>Department ID</th>
<th>Department Name</th>
<th>Department Head</th>
<th>Actions</th>
</thead>
<tbody>

<?php 
while($row = mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $row['dept_id']; ?></td>
<td><?php echo $row['dept_name'];?></td>
<td><?php echo $row['dept_head'];?></td>
<td>
<a href="edit_dept.php?id=<?php echo $row['dept_id'];?>">Edit/Update</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a href="remove_dept.php?id=<?php echo $row['dept_id'];?>">Remove</a>
</td>

</div>
</div>
<?php 
}
?>
</tbody>
</table>
</div>
</center>
</body>
</html>
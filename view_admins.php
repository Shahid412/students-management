<?php
require_once "connect.php";

if(isset($_GET['submit'])){
	$query = mysqli_real_escape_string($con, htmlspecialchars($_GET['query']));
	$result = mysqli_query($con, "SELECT * FROM admins where admin_name LIKE '%$query%'");
}
else {$result = mysqli_query($con, "SELECT * FROM admins");}
?>
<style>
<link rel="stylesheet" href="css/style.css">

</style>

<html>
<head>
	<title>Admins - SMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="container">
<br />
<center>
<div class="feed-container">
<h1>Admins</h1>
<div class="menu-items">
<a href="index.php">Home</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="add_admin.php">Add New</a>
</div>
<div class="search-bar">
<form method="get" action="">
<input type="text" name="query" placeholder="Search Admin Name...">
<input type="submit" class="submit" name="submit" Value="Search">
</form>
</div>
<div class="data-items">
<table>
<thead>
<th>Admin ID</th>
<th>Admin Name</th>
<th>Sex</th>
<th>Password</th>
<th>Actions</th>
</thead>
<tbody>

<?php 
while($row = mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $row['admin_id']; ?></td>
<td><?php echo $row['admin_name'];?></td>
<td><?php echo $row['sex'];?></td>
<td><?php echo $row['password'];?></td>
<td>
<a href="edit_admin.php?id=<?php echo $row['admin_id'];?>">Edit/Update</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a href="remove_admin.php?id=<?php echo $row['admin_id'];?>">Remove</a>
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
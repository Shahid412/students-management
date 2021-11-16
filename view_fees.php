<?php
require_once "connect.php";

if(isset($_GET['submit'])){
	$query = mysqli_real_escape_string($con, htmlspecialchars($_GET['query']));
	$result = mysqli_query($con, "SELECT stds.student_name, fees.receipt_no, fees.dated, fees.tution_fee
	FROM stds
	INNER JOIN fees ON stds.student_id=fees.student_id WHERE stds.student_name LIKE '%$query%'");
	} else {
	$result = mysqli_query($con, "SELECT stds.student_name, fees.receipt_no, fees.dated, fees.tution_fee
	FROM stds
	INNER JOIN fees ON stds.student_id=fees.student_id");
}
?>

<style>
</style>

<?php
require_once "connect.php";
?>

<html>
<head>
	<title>Fees - SMS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="container">
<br />
<center>
<div class="feed-container">
<h1>Fees</h1>
<div class="menu-items">
<a href="index.php">Home</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="add_fee.php">Add New</a>

</div>
<div class="search-bar">
<form method="get" action="">
<input type="text" name="query" placeholder="Search Student Name ...">
<input type="submit" class="submit" name="submit" Value="Search">
</form>
</div>
<div class="data-items">
<table>
<thead>
<th>Receipt No.</th>
<th>Student Name</th>
<th>Date</th>
<th>Tution Fee</th>
<th>Actions</th>
</thead>
<tbody>

<?php 
while($row = mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $row['receipt_no'];?></td>
<td><?php echo $row['student_name']; ?></td>
<td><?php echo $row['dated'];?></td>
<td><?php echo $row['tution_fee'];?></td>
<td>
<a href="edit_fee.php?id=<?php echo $row['receipt_no'];?>">Edit/Update</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a href="remove_fee.php?id=<?php echo $row['receipt_no'];?>">Remove</a>
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
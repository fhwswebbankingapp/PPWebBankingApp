<?php
	session_start();
	include('conn.php');
	$userid=$_SESSION['id'];
 
	$userq=mysqli_query($conn,"select * from `kunde` where id='$userid'");
	$userrow=mysqli_fetch_array($userq);
?>
<!doctype html>
<html>
<head>
	<title>Session Example</title>
</head>
<body>
	<h2>User Found! </h2>
	Welcome, <?php echo $userrow['username']; ?>
</body>
</html>
<?php 

	if(isset($_SESSION['reg_user'])){
		echo $_SESSION['reg_user'];
		unset($_SESSION['reg_user']);
	}

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>registration-success</title>
</head>
<body>
	<h2>You are successfuly registered.</h2>
	<h5>You can <a href="login.php">Login</a> Now</h5>
</body>
</html>
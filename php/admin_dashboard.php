
<?php 

	session_start();

	if(!isset($_SESSION['admin_username'])){
		header("location:login.php");
	}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin-Dadhboard</title>
</head>
<body>
	<h2>Wellcome: <?php echo $_SESSION['admin_username']; ?></h2>
</body>
</html>
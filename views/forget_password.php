<?php 
$status = null;
if(isset($_GET['status'])){
	$status = $_GET['status'];
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Forget Password</title>
	<link rel="stylesheet" href="css/form.css">
</head>
<body>

	<div class=" form-wrap con-div" id="cp">
		<h1>Username Checke</h1>
		<form action="../controllers/passwordController.php" method="post">
			<div class="form-group">
				<input type="email" name="username" required placeholder="Enter your username" >
			</div>
			<button type="submit" class="btn" name="un_submit">Submit</button>
		</form>
	</div>


	<div class=" form-wrap con-div" id="code">
		<h1>Code Check</h1>
		<form action="../controllers/passwordController.php" method="post">
			<div class="form-group">
				<input type="number" name="code" required placeholder="Enter Security Code" > 
			</div>
			<button type="submit" class="btn" name="code_submit">Submit</button>
		</form>
	</div>

	<div class=" form-wrap con-div" id="confirm">
		<h1>Change Password</h1>
		<form action="../controllers/passwordController.php" method="post">
			<div class="form-group">
				<input type="password" name="password" required placeholder="Enter New Password" >
				<input type="password" name="Con_password" required placeholder="Enter Confirm Password" >
			</div>
			<button type="submit" class="btn" name="fp_submit">Submit</button>
		</form>
	</div>

	<?php 

	if($status == '1A'){
	echo "<script> 
			document.getElementById('cp').style.display = 'none'
			document.getElementById('code').style.display = 'block'
	   </script>";
	}


	 ?>
</body>
</html>
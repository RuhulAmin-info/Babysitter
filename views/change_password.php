<?php 

$number = 10;

 ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Change Password</title>
	<link rel="stylesheet" href="css/form.css">
</head>
<body>
	
	<div class=" form-wrap con-div" id="cp">
		<h1>Password Check</h1>
		<form action="">
			<div class="form-group">
				<input type="password" name="username" required placeholder="Enter Current Password" >
			</div>
			<button type="submit" class="btn" name="cp_submit">Submit</button>
		</form>
	</div>


	<div class=" form-wrap con-div" id="code">
		<h1>Code Check</h1>
		<form action="">
			<div class="form-group">
				<input type="password" name="username" required placeholder="Enter Security Code" > 
			</div>
			<button type="submit" class="btn" name="code_submit">Submit</button>
		</form>
	</div>

	<div class=" form-wrap con-div" id="confirm">
		<h1>Change Password</h1>
		<form action="">
			<div class="form-group">
				<input type="password" name="password" required placeholder="Enter New Password" >
				<input type="password" name="Con_password" required placeholder="Enter Confirm Password" >
			</div>
			<button type="submit" class="btn" name="Con_submit">Submit</button>
		</form>
	</div>
	
</body>
<script>
	var x = <?php echo $number; ?>;
	document.getElementById('cp_Enter').addEventListener('click',myFun);

	function myFun(){
		alert(x);
		alert('click');
	}
	
</script>
</html>
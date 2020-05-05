<?php  
require_once'../controllers/usersController.php';

$activeUsers =  ActiveUser();

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Babysitter</title>
	<link rel="stylesheet" href="css/allbabysitter.css">
</head>
<body>
	<div class="container">
		<?php 
			foreach ($activeUsers as $user) {
				if($user['status'] == 'babysitter'){
					$pic = $user['profilePic'];
					
					echo '<div class="card">';
						echo '<div class="img">';
							echo '<img src="'.$pic.'"alt="">';
						echo '</div>';

						echo '<div class="info">';
							echo "<p>First Name: ".$user["firstName"]."</p>";

							echo "<p>Last Name: ".$user["lastName"]."</p>";
							echo "<p>Date of Birth: ".$user["dob"]."</p>";
							echo "<p> Address: ".$user["Address"]."</p>";
							echo "<p>About: ".$user["about"]."</p>";
							
						echo '</div>';
						echo '<div class="contract">';
							echo "<p>Email: ".$user["email"]."</p>";
							echo "<p>Phone: ".$user["phone"]."</p>";
						echo '</div>';
					echo '</div>';
				}
			}


		 ?>
		 <!--
		<div class="card">
			<div class="img">
				<img src="../assets/uploads/dummy.png" alt="">
			</div>
			<div class="info">
				info
			</div>
			<div class="contract">
				contract
			</div>

		</div>


		<div class="card">
			<div class="img">
				<img src="../assets/uploads/dummy.png" alt="">
			</div>
			<div class="info">
				info
			</div>
			<div class="contract">
				contract
			</div>

		</div>

		<div class="card">
			<div class="img">
				<img src="../assets/uploads/dummy.png" alt="">
			</div>
			<div class="info">
				info
			</div>
			<div class="contract">
				contract
			</div>

		</div>
		<div class="card">
			<div class="img">
				<img src="../assets/uploads/dummy.png" alt="">
			</div>
			<div class="info">
				info
			</div>
			<div class="contract">
				contract
			</div>

		</div>
-->
	</div>

</body>
</html>
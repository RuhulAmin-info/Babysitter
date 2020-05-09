<?php 
require_once 'header.php';
require_once '../controllers/adminController.php';
if(!isset($_SESSION['admin_username']))
    header("location:login.php");
    
$id = $_GET['id'];

$admin = GetAdmin($id);
$row = mysqli_fetch_assoc($admin);

  
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Profile</title>
	<link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/admin_profile.css">
</head>
<body>
	<div class="container">
		<div class="img">
			<h3>Profile Pic</h3>
			
			<img src="../assets/uploads/dummy.png" alt="">

			<form action="">
			<input type="file" class="file" required>
			<input type="submit" class="p-btn" value="Change Profile pic">
			</form>
			
		</div>
		<div class="info">
			<h2>Profile Details</h2>
			
			<span class="u_det">First Name:</span><span class="u_info"><?php echo $row['firstName']; ?></span><br>
			<span class="u_det">Last Name:</span><span class="u_info"><?php echo $row['lastName']; ?></span><br>
			<span class="u_det">Email:</span><span class="u_info"><?php echo $row['email']; ?></span><br>
			<span class="u_det">Date of Birth:</span><span class="u_info"><?php echo $row['dob']; ?></span><br>
			<span class="u_det">Phone Number:</span><span class="u_info"><?php echo $row['phone']; ?></span><br>
			<span class="u_det">Nid Number:</span><span class="u_info"><?php echo $row['nid']; ?></span><br>
			<span class="u_det">Address:</span><span class="u_info"><?php echo $row['address']; ?></span><br>
			<span class="u_det">Zip:</span><span class="u_info"></span><?php echo $row['zip']; ?><br>
			<span class="u_det">City:</span><span class="u_info"><?php echo $row['city']; ?></span><br>
			<span class="u_det">Join Date:</span><span class="u_info"><?php echo $row['join_date']; ?></span><br>

			<div class="operation">
				<a  class="u_btn" href="update_admin.php?id=<?php echo $id; ?>">Update Profile</a>
				

			</div>

			
			
		</div>
	</div>
	<?php
        require_once 'footer.php';

    ?>
</body>
</html>
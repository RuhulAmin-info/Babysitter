<?php 
require_once '../controllers/usersController.php';
//require_once'../controllers/parentsAccountController.php';
if(!isset($_SESSION['babysitter_username'])){
    header("location:login.php");
 }

$id = $_GET['id'];
$user = GetUser($id);
$row = mysqli_fetch_assoc($user);
$account = GetAccountDetails($row['email']);
$accountData = mysqli_fetch_assoc($account);
	require_once 'header.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/babysitter_profile.css">
	
</head>
<body>
	<div class="container">
		<div class="profile-pic">
			
			<div class="imgDiv">
				<img src="<?php echo $row['profilePic'] ?>" alt="">

			</div>
			<div class="update-profile">
				<form action="">
					<input type="file" required>
					<input class="up-button" type="submit" name="submit" value="Update Profile Picture">
				</form>
			</div>
		</div>
		<div class="profile-info">
			<span class="u_det">First Name:</span><span class="u_info"><?php echo $row['firstName']; ?></span><br>
			<span class="u_det">Last Name:</span><span class="u_info"><?php echo $row['lastName']; ?></span><br>
			<span class="u_det">Email:</span><span id="email" class="u_info"><?php echo $row['email']; ?></span><br>
			<span class="u_det">Date of Birth:</span><span class="u_info"><?php echo $row['dob']; ?></span><br>
			<span class="u_det">Phone Number:</span><span class="u_info"><?php echo $row['phone']; ?></span><br>
			<span class="u_det">Nid Number:</span><span class="u_info"><?php echo $row['nid']; ?></span><br>
			<span class="u_det">Address:</span><span class="u_info"><?php echo $row['Address']; ?></span><br>
			<span class="u_det">Gender:</span><span class="u_info">   <?php echo $row['gender']; ?></span><br>
			<span class="u_det">Type:</span><span class="u_info"><?php echo $row['status']; ?></span><br>
			<span class="u_det">Join Date:</span><span class="u_info"><?php echo $row['join_date']; ?></span><br>
			<span class="u_det">About:</span><span class="u_info"><?php echo $row['about']; ?></span><br>

			<div class="action_btn">
				
				<a href="update_user.php?id=<?php echo $id ?>">Update Profile Info</a>
				<a href="change_password.php?id=<?php echo $row['email']; ?>">Change Password</a>
			</div>
		</div>

	</div>
	
	<!-- <script src="../controllers/js/acountControlar.js"></script>  -->
</body>
</html>

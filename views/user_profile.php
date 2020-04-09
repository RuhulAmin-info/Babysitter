<?php 

require_once '../controllers/usersController.php';
if(!isset($_SESSION['parents_username'])){
    header("location:login.php");
 }

$id = $_GET['id'];
$user = GetUser($id);
$row = mysqli_fetch_assoc($user);
	require_once 'header.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/user_profile.css">
	
</head>
<body>
	<div class="container">
		<div class="profile">
			
			<div class="imgDiv">
				<img src="<?php echo $row['profilePic'] ?>" alt="">

			</div>
			<div>
				<span class="u_det">First Name:</span><span class="u_info"><?php echo $row['firstName']; ?></span><br>
				<span class="u_det">Last Name:</span><span class="u_info"><?php echo $row['lastName']; ?></span><br>
				<span class="u_det">Email:</span><span class="u_info"><?php echo $row['email']; ?></span><br>
				<span class="u_det">Date of Birth:</span><span class="u_info"><?php echo $row['dob']; ?></span><br>
				<span class="u_det">Phone Number:</span><span class="u_info"><?php echo $row['phone']; ?></span><br>
				<span class="u_det">Nid Number:</span><span class="u_info"><?php echo $row['nid']; ?></span><br>
				<span class="u_det">Address:</span><span class="u_info"><?php echo $row['Address']; ?></span><br>
				<span class="u_det">Gender:</span><span class="u_info">   <?php echo $row['gender']; ?></span><br>
				<span class="u_det">Type:</span><span class="u_info"><?php echo $row['status']; ?></span><br>
				<span class="u_det">Join Date:</span><span class="u_info"><?php echo $row['join_date']; ?></span><br>
				<span class="u_det">About:</span><span class="u_info"><?php echo $row['about']; ?></span><br>

				

			</div>

		</div>
		<div class="operation">
			<div class="card">
				<div style="text-align: center;">
					<h3>Total Deposite</h3>
					<span id="Total_deposit">0.00 </span><span>BDT</span>
				</div>
				<input id="dep_balance" type="text" placeholder="Enter Amount For Deposit">
				<input  id ="dep_btn"type="submit" value="DEPOSIT">
			</div>
			<div class="card">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, enim.
			</div>

			<div class="action_btn">
				<a href="">Update Profile Pic</a>
				<a href="">Update Profile Info</a>
				<a href="">Change Password</a>
			</div>
		</div>
	</div>
	<div style="margin:20px 0px 0px 60px">
		<h3>Choose Profile Picture</h3>
		<input style="font-size: 16px;" type="file">
	</div>
</body>
</html>

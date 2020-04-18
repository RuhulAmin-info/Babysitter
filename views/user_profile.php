<?php 
require_once '../controllers/usersController.php';
//require_once'../controllers/parentsAccountController.php';
if(!isset($_SESSION['parents_username'])){
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
				<span class="u_det">Email:</span><span id="email" class="u_info"><?php echo $row['email']; ?></span><br>
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
					<span class="money" id="Total_deposit"><?php echo $accountData['total_deposit']; ?></span><span>BDT</span>
				</div>
				<input id="dep_balance" type="number" placeholder="Enter Amount For Deposit">
				<input  id ="dep_btn"type="submit" value="DEPOSIT">
			</div>
			<div class="card" style="text-align: center;">
				<h3>Total Spend</h3>
				<span  class="money" id="Total_spend"><?php echo $accountData['total_spend']; ?></span><span>BDT</span>
				<h3>Current Balance</h3>
				<span class="money" id="current_balance"><?php echo $accountData['current_balance']; ?></span><span>BDT</span>
			</div>

			<div class="action_btn">
				
				<a href="update_user.php?id=<?php echo $id ?>">Update Profile Info</a>
				<a href="">Change Password</a>
			</div>
		</div>
	</div>
	<div style="margin:20px 0px 0px 60px">
		<form action="">
			<h3>Choose Profile Picture</h3>
			<input style="font-size: 16px;" type="file" required>
			<input type="submit" value="update profile Picture">
		</form>
	</div>
	<script src="../controllers/js/acountControlar.js"></script> 
</body>
</html>

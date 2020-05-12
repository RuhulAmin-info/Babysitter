<?php
require_once 'header.php'; 
require_once '../controllers/usersController.php';
//require_once'../controllers/parentsAccountController.php';
if(!isset($_SESSION['babysitter_username'])){
    header("location:login.php");
 }

$id = $_GET['id'];
$_SESSION['babysitter_id'] = $id;
$user = GetUser($id);
$row = mysqli_fetch_assoc($user);
$account = GetAccountDetails($row['email']);
$accountData = mysqli_fetch_assoc($account);
$join_date = $row['join_date'];
$time = strtotime($join_date);
$human_time = humanTiming($time);
function humanTiming ($time)
		{

		    $time = time() - $time; // to get the time since that moment
		    $time = ($time<1)? 1 : $time;
		    $tokens = array (
		        31536000 => 'year',
		        2592000 => 'month',
		        604800 => 'week',
		        86400 => 'day',
		        3600 => 'hour',
		        60 => 'minute',
		        1 => 'second'
		    );

		    foreach ($tokens as $unit => $text) {
		        if ($time < $unit) continue;
		        $numberOfUnits = floor($time / $unit);
		        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
		    }

		}	
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
				<img src="<?php echo $row['profile_pic'] ?>" alt="">

			</div>
			<div class="update-profile">
				<form action="../controllers/updateProfilePic.php" method="post" enctype="multipart/form-data">
					<input type="file" name="img"  required>
					<input class=" " type="submit" name="update_pic_bs"  value="Update Profile Picture">
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
			<span class="u_det">Join: </span><span class="u_info"><?php echo $human_time; ?>-Ago</span><br>
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

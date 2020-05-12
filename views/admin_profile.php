<?php 
require_once 'header.php';
require_once '../controllers/adminController.php';
if(!isset($_SESSION['admin_username']))
    header("location:login.php");
    
$id = $_GET['id'];
$_SESSION['admin_id'] = $id;

$admin = GetAdmin($id);
$row = mysqli_fetch_assoc($admin);
$join_date = $row['join_date'];
$time = strtotime($join_date);
$human_date = humanTiming ($time);

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
	<title>Admin Profile</title>
	<link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/admin_profile.css">
</head>
<body>
	<div class="container">
		<div class="img">
			<h3>Profile Pic</h3>
			
			<img src="<?php echo $row['profile_pic'] ?>" alt="">

			<form action="../controllers/updateProfilePic.php" method="post" enctype="multipart/form-data">
				<input type="file" name="img" class="file" required>
				<input type="submit" class="p-btn" name="update_pic" value="Change Profile pic">
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
			<span class="u_det">Join: </span><span class="u_info"><?php echo $human_date; ?>-Ago</span><br>

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
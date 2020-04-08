<?php 

//session_start();
require_once '../controllers/adminController.php';
$user = null;
if(!isset($_SESSION['admin_username']))
    header("location:login.php");
    
 $user = $_SESSION['admin_username'];
 $id = GetId($user);
 



  $password_error = null;
  $message = null;
  $trams_error = null;
  if(isset($_SESSION['password_geter'])){
    $password_error = $_SESSION['password_geter'];
    unset($_SESSION['password_geter']);
  }
  if(isset($_SESSION['password_not_match'])){
    $password_error = $_SESSION['password_not_match'];
    unset($_SESSION['password_not_match']);
  }
  if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
  }


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin-Dashboard</title>
    <link rel="icon" href="../imgs/favicon.png">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/dashboard.css">
    
</head>
<body>
    <nav id="navber">
		<h1 class="logo">
			<span class="logo-text">
                Admin Dashboard <span class="Wellcome">Welcome: <?php echo $user; ?> </span>
			</span>
		</h1>
		<ul>
			
			<li> <button class="Logout">Logout</button></li>
		</ul>
	</nav>
    <div class="wrapper">
        <div class="sidebar">
            
            <ul>
                <li><a href=""> <span><i class="fas fa-home"></i></span>Home</a></li>
                <li><a href="all-admin.php"><span><i class="fas fa-user-shield"></i></span>Admin</a>
                    <ul>
                        <li><a href="#container"> <span><i class="fas fa-plus"></i></span>Add</a></li>
                    
                    </ul>
                </li>

                <li><a href=""><span><i class="far fa-edit"></i></span>Post</a>
                
                    <ul>
                        <li><a href="new-job.php"> <span><i class="fas fa-plus"></i></span>Add</a></li>
                        
                    </ul>
                
                </li>

                <li><a href="all-users.php"><span><i class="fas fa-users"></i></span>Users</a></li>
                <li><a href="admin_profile.php?id=<?php echo $id ?>"><span><i class="fas fa-user-circle"></i>    </span>Profile</a>
                </li>
                <li><a href="all-users.php"><span><i class="fas fa-key"></i></span>Change Password</a>
                </li>
            </ul>
        </div>
        <div class="main-space">
            <div class="overview">
                <h1>Overview</h1>
            </div>
            
            
        <div id="container">
            <div class="form-wrap">
                <h1>Add Admin</h1>

                <div class="error">
                <p> <?php echo $password_error; ?></p>
                <p style="color: green;"><?php echo $message; ?></p>
                </div>

                <form method="post" action="../controllers/adminController.php">
                <div class="display">
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input type="text" name="firstName" required>
                    </div>

                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input type="text" name="lastName"  required>
                    </div>
                </div>

                <div class="display">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="Phone">Phone No</label>
                        <input type="number" name="phone" required>
                    </div>
                </div>

                <div class="display">
                    <div class="form-group">
                        <label for="Birth-date">Birth Date</label>
                        <input type="date" name="birth_date" required>
                    </div>
                    <div class="form-group">
                        <label for="nid">NID No</label>
                        <input type="number" name="nid" required>
                    </div>
                </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" required>
                        </div>

                 <div class="display">
                        <div class="form-group">
                             <label for="zip-code">Zip</label>
                             <input type="number" name="zip" required>
                        </div>
                        <div class="form-group">
                             <label for="city">City</label>
                             <input type="text" name="city" required>
                        </div>
                </div>
                <div class="display">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" required >
                    </div>

                    <div class="form-group">
                            <label for="password2">Confirm Password</label>
                            <input type="password" name="password2" required>
                    </div>
                </div>
                <button type="submit" class="btn" name="sing_submit">ADD</button>
                </form>
            </div>
            </div>
            
        </div>
    </div>
    <?php require_once 'footer.php'; ?>
</body>

</html>
<?php 
	
require_once '../models/database.php';
session_start();
if(isset($_POST['submit'])){
	
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);

	if($username && $password){
		
		$sql ="SELECT * FROM login WHERE username = '$username'";
		$result = getData($sql);

		if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_assoc($result);
			$db_password = $row['password'];
			$status = $row['status'];

			if(password_verify($password, $db_password )){
				if($status == "Admin"){
					$_SESSION['admin_username'] = $username;
					header("location:../views/admin_dashboard.php");
				}
				else if($status == "parents" || $status=="babysitter"){
					$sql = "SELECT * FROM users WHERE email = '$username'";
					$result = getData($sql);
					$row = mysqli_fetch_assoc($result);
					if($row['profileStatus'] == 'review'){
						header("location:../views/review_user.php");
					}
					else if($row['profileStatus'] == 'active' && $status=="parents"){
						header("location:../views/parents-dashboard.php");
					}else if($row['profileStatus'] == 'active' && $status=="babysitter"){
						header("location:../views/babysitter-dashboard.php");
					}
					
				}
			}
			else{
				$_SESSION['error']="password not match";
				header("location:../views/login.php");
				exit();
			}

		}
		else{
			$_SESSION['error']="Invalid Username";
			header("location:../views/login.php");
			exit();
		}

	}
}



 ?>
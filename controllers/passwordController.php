<?php 
require_once '../models/database.php';
session_start();

if(isset($_POST['cp_submit'])){
	$username = $_SESSION['username'];
	$password = $_POST['password'];
	CheckUser($username,$password);
}

if(isset($_POST['Con_submit'])){
	$password = $_POST['password'];
	$password2 = $_POST['Con_password'];
	if(strlen($password) < 6){
		echo "password must me 6 or gater";
	}
	else if($password != $password2){
		echo "password not match";
	}
	else{
		$username = $_SESSION['username'];
		ChangePassword($username,$password);
	}
}







function CheckUser($username,$password){
	$sql ="SELECT * FROM login WHERE username = '$username'";
	$result = getData($sql);
	if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_assoc($result);
		$db_password = $row['password'];

		if(password_verify($password, $db_password)){			
     	// $_SESSION['username'] = $username;
			header("location:../views/change_password.php?status=1*1");
		}
		else{
			echo "password not match";
		}
	}
	else{
		echo "username not valid";
	}
}


function ChangePassword($username,$password){

	$password_hash = password_hash($password, PASSWORD_DEFAULT);
	$sql = "UPDATE login SET password = '$password_hash' WHERE username = '$username'";
	$result = insertData($sql);
	if($result){
		echo "password change success";
		echo "<br>";
		echo '<a href="../views/login.php">Login Using Your New Password</a>';
	}
	else{
		echo "Faild to change password";

	}
}

 ?>
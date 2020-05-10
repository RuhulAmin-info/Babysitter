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

if(isset($_POST['un_submit'])){
	$username = htmlspecialchars($_POST['username']);
	SendCode($username);
}

if(isset($_POST['code_submit'])){
	CheckCode();
}




function SendCode($username){
	$sql ="SELECT * FROM login WHERE username = '$username'";
	$result = getData($sql);
	if(mysqli_fetch_assoc($result)> 0){

		//send email
	  $code = mt_rand(100000, 999999);
	  $_SESSION['P_R_C'] = $code;
	  $to = $username;
   	  $subject = "Recovary Code";
	  $message = '<h3>Your Password Recovary Code: '.$code.'</h3>';
	  $headers = "From: ruhulinfo50@gmail.com \r\n";
	  $headers .= "MIME-Version: 1.0" . "\r\n";
	  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	  if(mail($to, $subject, $message,$headers)){
	  	echo "Check you Mail to verification Code";
	  	header("location:../views/forget_password.php?status=1A");
	  }
	  else{
	  	echo "Faild to send code";
	  }  
	}
	else{
		//user not valid
		echo "user not valid";
	}
}

function CheckCode(){
	$code = $_SESSION['P_R_C'];
	echo "$code";
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
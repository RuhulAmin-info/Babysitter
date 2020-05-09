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
		echo "go for work";
	}
}







function CheckUser($username,$password){
	$sql ="SELECT * FROM login WHERE username = '$username'";
	$result = getData($sql);
	if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_assoc($result);
		$db_password = $row['password'];

		if(password_verify($password, $db_password)){
			///
			$html = file_get_contents('../views/change_password.php');
	        $dom = new DOMDocument();
	        $dom->loadHTML($html);
			$div = $dom->getElementById('cp');
			// if ($div->hasAttributes()) {
			//     echo $div->setAttribute('class', 'hidden-task');//width:100px;
			// }
			$div->setAttribute('class', 'hidden-task');



			// $_SESSION['username'] = $username;
			header("location:../views/change_password.php?id=1*1");
		}
		else{
			echo "password not match";
		}
	}
	else{
		echo "username not valid";
	}
}

 ?>
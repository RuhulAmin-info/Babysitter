<?php 
	session_start();
	if(isset($_POST['sing_submit'])){
		Add_admin();
	}




	function Add_admin(){

		$firstName = htmlspecialchars($_POST['firstName']);
		$lastName = htmlspecialchars($_POST['lastName']);
		$email = htmlspecialchars($_POST['email']);
		$phone = htmlspecialchars($_POST['phone']);

		$birth_date = htmlspecialchars($_POST['birth_date']);
		$nid = htmlspecialchars($_POST['nid']);
		$address = htmlspecialchars($_POST['address']);
		$city = htmlspecialchars($_POST['city']);
		$zip = htmlspecialchars($_POST['zip']);

		if(!empty($_POST['password']) && strlen($_POST['password']) < 6){
		$password_error = "password must be at last six characters";
		$_SESSION['password_geter'] = $password_error;
		header("location:../views/admin_dashboard.php");
		exit();

		}
		else{

		  	if(($_POST['password']== $_POST['password2']) && (strlen($_POST['password2']) > 6)){
		  	 
		      $password = htmlspecialchars($_POST['password2']);
		      
		    }
		    else{
		      $password_error = "password did not match";
		      $_SESSION['password_not_match'] = $password_error;
		      header("location:../views/admin_dashboard.php");
		      exit();
		    }

		}
		if($firstName && $lastName && $email &&  $phone && $birth_date && $nid &&
			$address && $city && $zip && $password){
			$password_hash = password_hash($password, PASSWORD_DEFAULT);

			echo $firstName;
			echo $lastName;
			echo $email;
			echo $phone;
			echo $birth_date;
			echo $nid;
			echo $address;
			echo $city;
			echo $zip;
			echo $password_hash;
		}
	}

 ?>
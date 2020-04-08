<?php 
	require_once '../models/database.php';
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
			/*echo $firstName;
			echo $lastName;
			echo $email;
			echo $phone;
			echo $birth_date;
			echo $nid;
			echo $address;
			echo $city;
			echo $zip;
			echo $password_hash;*/


			$sql = "INSERT INTO admin (firstName, lastName,email,dob,phone,nid,address,zip,city) VALUES ('$firstName','$lastName','$email','$birth_date','$phone','$nid','$address','$zip','$city')";

			$result = insertData($sql);
			
			if($result){
				$query = "INSERT INTO login (username,password,status) VALUES ('$email','$password_hash','Admin')";
				$newResult = insertData($query);
				if($newResult){
					 $_SESSION['message'] = "Successfully Added.";
				      header("location:../views/admin_dashboard.php");
				      exit();
				}
				else{
					 $_SESSION['message'] = "Faild.";
				      header("location:../views/admin_dashboard.php");
				      exit();
				}
			}
			else{
				 $_SESSION['message'] = "Faild.";
				 header("location:../views/admin_dashboard.php");
				  exit();
			}
		}
	}


  function GetAllAdmin(){
    $sql = "SELECT * FROM admin";

    $allAdmin = getData($sql);

    return $allAdmin;
  }

  function GetId($email){
  	$sql = "SELECT * FROM admin WHERE email='$email'";
  	$result = getData($sql);
  	$row = mysqli_fetch_assoc($result);

  	return $row['id'];
  }

  function GetAdmin($id){
  	$sql = "SELECT * FROM admin WHERE id='$id'";
  	$result = getData($sql);
  	

  	return $result;
  }

 ?>
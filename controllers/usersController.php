<?php 
	session_start();
	require_once '../models/database.php';

	//call the function base on condition
	if(isset($_POST['submit'])){
		Login();
  	}
  	if(isset($_POST['first_submit'])){
  		Registration_Start();	
	}
	if(isset($_POST['submit_reg'])){

		if(isset($_SESSION['status'])){
			
			$status =  $_SESSION['status'];
			unset($_SESSION['status']);
			$_SESSION['user_Type'] = $status;
		}

		Get_Personal_info();
		Insert_Data();
		
	}



//..............start of login........................
function Login(){
	
      $username = htmlspecialchars($_POST['username']);
      $password = htmlspecialchars($_POST['password']);
    
    if($username && $password){

      if($username == 'admin@gmail.com' && $password =='admin123'){

        $_SESSION['admin_username'] = $username;
        header("location:../views/admin_dashboard.php");
      }
      else if($username ='user@gmail.com' && $password == 'user123'){
        header("location:../views/parents-dashboard.php");
      }
      else{
        $error = "invalid username or password";
        $_SESSION['error'] = $error;
        header("location:../views/login.php");
        exit();
      }

    }
}
//.......................End of Login........................	




function Registration_Start(){

	
   $firstName = htmlspecialchars($_POST['firstName']);
   $_SESSION ['firstName'] = $firstName;
   

    $lastName = htmlspecialchars($_POST['lastName']);
    $_SESSION ['lastName'] = $lastName;
  
    $email = htmlspecialchars($_POST['email']);
    $_SESSION ['email'] = $email;
  
  if(!empty($_POST['password']) && strlen($_POST['password']) < 6){
    $password_error = "password must be at last six characters";
    $_SESSION['password_geter'] = $password_error;
    header("location:../views/registration.php");
    exit();

  }
  else{

  	 if(($_POST['password']== $_POST['password2']) && (strlen($_POST['password2']) > 6)){
  	 
      $password = htmlspecialchars($_POST['password2']);
      $_SESSION ['password'] = $password;
    }
    else{
      $password_error = "password did not match";
      $_SESSION['password_not_match'] = $password_error;
      header("location:../views/registration.php");
      exit();
    }

  }
  if(empty($_POST['checkbox'])){
    $checkbox_error = "You have to agree with trams& condition";
    $_SESSION['checkbox_error'] = $checkbox_error;
    header("location:../views/registration.php");
    exit();
  }
  else{
    $checkbox = htmlentities($_POST['checkbox']);
  }
  if($firstName && $lastName && $email && $password ){
  	$_SESSION['username'] = $email;
  	header("location:../views/middle.php");
  }

}
	

function Get_Personal_info(){

	
	$phone = htmlspecialchars($_POST['phone']);
	$_SESSION ['phone'] = $phone;
	
	$nid = htmlspecialchars($_POST['nid']);
	$_SESSION ['nid'] = $nid;
	
	$DOB = htmlspecialchars($_POST['dob']);
	$_SESSION ['dob'] = $DOB;
	
	$current_job = htmlspecialchars($_POST['current_job']);
	$_SESSION ['current_job'] = $current_job;
	
	$gender = $_POST["gender"];
	$_SESSION['gender'] = $gender;
	
	$about = htmlspecialchars($_POST['about']);
	$_SESSION ['about'] = $about;
	
}

function Insert_Data(){
	
	
	echo $_SESSION['firstName'];
	echo $_SESSION['lastName'];
	echo $_SESSION['email'];
	echo $_SESSION['password'];
	echo $_SESSION['phone'];
	echo $_SESSION['nid'];
	echo $_SESSION['dob'];
	echo $_SESSION['current_job'];
	echo $_SESSION['about'];
	echo $_SESSION['user_Type'];
	echo $_SESSION['gender'];
	
}
	
 ?>
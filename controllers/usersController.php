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
		//Insert_Data();
		
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

  $img = $_FILES['img'];
  $imgName = $_FILES['img']['name'];
  $imgTmp_der = $_FILES['img']['tmp_name'];
  $imgSize = $_FILES['img']['size'];
  $imgError = $_FILES['img']['error'];

  $imgExt = explode('.', $imgName);
  $imgActualExt = strtolower(end($imgExt));
  $email = $_SESSION['email'];

  $allowed = array('jpg','jpeg','png');
  if(in_array($imgActualExt, $allowed)){
    if($imgError === 0){
        $ImgNewName = $email.".".$imgActualExt;
        $Img_location = '../assets/uploads/'.$ImgNewName;
        move_uploaded_file($imgTmp_der, $Img_location);
        $_SESSION['img_location'] = $Img_location;
    }else{
        //error can not upload
    }

  }else{
    //type error;
  }
 // Insert_Data();
	
}

function Insert_Data(){
	
	$firstName= $_SESSION['firstName'];
	$lastName= $_SESSION['lastName'];
	$email=$_SESSION['email'];
	$password= $_SESSION['password'];
	$phone= $_SESSION['phone'];
	$nid =  $_SESSION['nid'];
	$dob = $_SESSION['dob'];
	$current_job =  $_SESSION['current_job'];
	$about =  $_SESSION['about'];
	$user_Type =  $_SESSION['user_Type'];
	$gender =  $_SESSION['gender'];
  $Img_location = $_SESSION['img_location'];
  
	
}
	
 ?>
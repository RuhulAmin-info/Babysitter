<?php 
	session_start();
	require_once '../models/database.php';

	//call the function base on condition
	
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
    $sql = "SELECT * FROM login WHERE username = '$email'";
    $result = getData($sql);
    if(mysqli_num_rows($result)>0){
      $_SESSION['username_error'] = "Email alredy used";
      header("location:../views/registration.php");
      exit();
    }
    else{
       $_SESSION ['email'] = $email;
    }
    // $result = getData($sql);
    // $row = mysqli_fetch_assoc($result);

    // if($email == $row['username']){
    //   $_SESSION['username_error'] = "Email Alredy Used";
    // }else{
    //    $_SESSION ['email'] = $email;
    // }
   
  
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
  $sql = "SELECT * FROM users WHERE phone = '$phone'";
  $result = getData($sql);
  if(mysqli_num_rows($result)>0){
    $_SESSION['phone_error'] = "Phone number alredy exist";
    header("location:../views/complete_registration.php");
    exit();
  }else{
    $_SESSION ['phone'] = $phone;
  }

	
	$nid = htmlspecialchars($_POST['nid']);
  $sql1 = "SELECT * FROM users WHERE nid = '$nid'";
  $result1 = getData($sql1);
  if(mysqli_num_rows($result1)>0){
    $_SESSION['nid_error'] = "Nid alredy exist";
    header("location:../views/complete_registration.php");
    exit();
  }
  else{
    $_SESSION ['nid'] = $nid;
  }

	
	
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
  Insert_Data();
	
}

function Insert_Data(){
	
	$firstName= $_SESSION['firstName'];
	$lastName= $_SESSION['lastName'];
	$email=$_SESSION['email'];
	$password= $_SESSION['password'];
	$phone= $_SESSION['phone'];
	$nid =  $_SESSION['nid'];
	$dob = $_SESSION['dob'];
	$address =  $_SESSION['current_job'];
	$about =  $_SESSION['about'];
	$user_Type =  $_SESSION['user_Type'];
	$gender =  $_SESSION['gender'];
  $Img_location = $_SESSION['img_location'];
  
  if($firstName && $lastName && $email && $password && $phone && $nid && $dob && $address && $about && $user_Type && $gender && $Img_location)
  {
    //echo "ok";
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    

   $sql = "INSERT INTO users (firstName,lastName,email,phone,nid,dob,Address,status,gender,about,profilePic) VALUES ('$firstName','$lastName','$email','$phone','$nid','$dob','$address','$user_Type','$gender','$about','$Img_location')";

      $result = insertData($sql);

      
      if($result){ 
        $query = "INSERT INTO login (username,password,status) VALUES ('$email','$password_hash','$user_Type')";
        $newResult = insertData($query);
        if($newResult){
          $_SESSION['reg_user'] = $email;
          header("location:../views/registration_success.php");
        }
        else{
          echo "Faild to insert login";
        }
      }
      else{
        echo "Faild";
      } 
  }
	
}

  function GetReviewUser(){
    $sql = "SELECT * FROM users WHERE profileStatus ='review'";

    $reviewUser = getData($sql);

    return $reviewUser;
  }

  function ActiveUser(){
    $sql = "SELECT * FROM users WHERE profileStatus ='active'";

    $reviewUser = getData($sql);

    return $reviewUser;
  }

  function DeactiveUser(){
    $sql = "SELECT * FROM users WHERE profileStatus ='deactive'";

    $reviewUser = getData($sql);

    return $reviewUser;
  }


   function GetId($email){
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = getData($sql);
    $row = mysqli_fetch_assoc($result);

    return $row['id'];
  }


  function Getuser($id){
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = getData($sql);
    

    return $result;
  }

  function GetAccountDetails($email){
    $sql = "SELECT * FROM account WHERE username='$email'";
    $result = getData($sql);

    return $result;
  }

  function GetSercice($email){
    $sql = "SELECT count(id) AS total FROM post Where username = '$email' AND status ='completed'";
     $result = getData($sql);
     $values = mysqli_fetch_assoc($result);
     $num_row = $values['total'];
     return $num_row;
  }

    function TotalPost($email){
    $sql = "SELECT count(id) AS total FROM post Where username = '$email'";
     $result = getData($sql);
     $values = mysqli_fetch_assoc($result);
     $num_row = $values['total'];
     return $num_row;
  }


  function JobDone($email){
    $sql = "SELECT count(id) AS total FROM post Where done_by = '$email' AND status ='completed'";
     $result = getData($sql);
     $values = mysqli_fetch_assoc($result);
     $num_row = $values['total'];
     return $num_row;
  }

  function AvailableJob(){
    $sql = "SELECT count(id) AS total FROM post WHERE status ='active'";
     $result = getData($sql);
     $values = mysqli_fetch_assoc($result);
     $num_row = $values['total'];
     return $num_row;
  }
	

 ?>
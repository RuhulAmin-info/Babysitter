<?php 

$firstName_error = null;
$lastName_error = null;
$email_error = null;
$password_error = null;
$password2_error = null;
$firstName = null;
$lastName = null;
$email = null;
$password = null;
$password2 = null;
$success = null;
$checkbox_error = null;
$checkbox = null;


if(isset($_POST['sing_submit'])){

  
  if(empty($_POST['firstName'])){
    $firstName_error = "firstName required*";
    
  }
  else{
    $firstName = htmlspecialchars($_POST['firstName']);
  }

  if(empty($_POST['lastName'])){
    $lastName_error = "lastName required*";
  }
  else{
    $lastName = htmlspecialchars($_POST['lastName']);
  }
  if(empty($_POST['email'])){
    $email_error = 'email required*';
  }
  else{
    $email = htmlspecialchars($_POST['email']);
  }

  if(empty($_POST['password']) || empty($_POST['password2'])){
    $password_error = "password required*";
  }
  
  if(!empty($_POST['password']) && strlen($_POST['password']) < 6){
    $password_error = "password must be at last six characters";

  }
  else{

  	 if(($_POST['password']== $_POST['password2']) && (strlen($_POST['password2']) > 6)){
      $password = htmlspecialchars($_POST['password2']);
    }
    else{
      $password_error = "password did not match";
    }

  }
  if(empty($_POST['checkbox'])){
    $checkbox_error = "You have to agree with trams& condition";
  }
  else{
    $checkbox = htmlentities($_POST['checkbox']);
  }
 
 

  if($firstName && $lastName && $email && $password && $checkbox){
    $success = "Registration Successfull";
    
  }


}




 ?>




<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Registration</title>
    <link
      href="https://fonts.googleapis.com/css?family=Raleway"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/form.css">
</head>
<body>
<div id="container">
      <div class="form-wrap">
        <h1>Sign Up</h1>
        <div class="error">
          
            <p><?php echo $password_error; ?></p>
            <p><?php echo $firstName_error; ?></p>
            <p><?php echo $lastName_error; ?></p>
            <p><?php echo $email_error ?></p>
            <p><?php echo $checkbox_error; ?></p>
            <p style="color: green;"><?php echo $success; ?></p>
          
        </div>

        <form method="post">
          <div class="form-group name">
            <label for="first-name">First Name</label>
            <input type="text" name="firstName" required>
          </div>

          <div class="form-group name">
            <label for="last-name">Last Name</label>
            <input type="text" name="lastName"  required>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" required>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" required >
          </div>

          <div class="form-group">
            <label for="password2">Confirm Password</label>
            <input type="password" name="password2" required>
          </div>
            
            <div class="checkbox">
            <input type="checkbox" name="checkbox" value="agree">
            
             <p>
              Agree with
            <a href="#">Terms & Conditions</a> and
            <a href="#">Privacy Policy</a>
           </p>  
           </div>
          <button type="submit" class="btn" name="sing_submit">Sign Up</button>
        </form>
      </div>
      <footer>

        <p>Already have an account? <a href="login.php">Login Here</a></p>
      </footer>
    </div>
</body>
</html>
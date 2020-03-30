<?php 
  session_start();
  $password_error = null;
  $trams_error = null;
  if(isset($_SESSION['password_geter'])){
    $password_error = $_SESSION['password_geter'];
    unset($_SESSION['password_geter']);
  }
  if(isset($_SESSION['password_not_match'])){
    $password_error = $_SESSION['password_not_match'];
    unset($_SESSION['password_not_match']);
  }
   if(isset($_SESSION['checkbox_error'])){
    $trams_error = $_SESSION['checkbox_error'];
    unset($_SESSION['checkbox_error']);
  }
  session_destroy();
 ?>




<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Registration</title>
    <link rel="icon" href="../imgs/favicon.png">
    <link
      href="https://fonts.googleapis.com/css?family=Raleway"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
<div id="container">
      <div class="form-wrap">
        <h1>Sign Up</h1>
        <div class="error">
          <p><?php echo $password_error; ?></p>
          <p><?php echo $trams_error; ?></p>
          
          
        </div>

        <form method="post" action="../controllers/usersController.php">
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
            <a href="../php/trems.php">Terms & Conditions</a> and
            <a href="#">Privacy Policy</a>
           </p>  
           </div>
          <button type="submit" class="btn" name="first_submit">Sign Up</button>
        </form>
      </div>
      <footer>

        <p>Already have an account? <a href="login.php">Login Here</a></p>
      </footer>
    </div>
</body>
</html>
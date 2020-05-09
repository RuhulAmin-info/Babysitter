<?php 
  
  $error = null;
 session_start();
 if(isset($_SESSION['error'])){
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
 }
session_destroy();
?>







<!DOCTYPE html>
<html>
  <head>
    <title>Login page</title>
    <link rel="icon" href="../assets/imgs/favicon.png">
    <link
      href="https://fonts.googleapis.com/css?family=Raleway"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/form.css">
  </head>
  <body>
    
    <div id="container" class="login">
      <div class="form-wrap">
        <h1>Sing In</h1>
        
        <div class="error">
          
        <p><?php echo $error; ?></p>
        </div>

        <form action="../controllers/loginController.php" method="post"> 
            <div class="form-group">
            <label for="username">Username</label>
            <input type="email" name="username" value="" required placeholder="Enter Your Email" >
            </div>
             <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" value="" required placeholder="Enter Your Password">
            </div>
          <button type="submit" class="btn" name="submit">Login</button>
        </form>
      </div>
      <footer>
        <p>Can't Assess? <a href="">Forget Password</a></p>
        <p>Not A Member? <a href="registration.php">Registation</a></p>
      </footer>
    </div>
   
  </body>
</html>

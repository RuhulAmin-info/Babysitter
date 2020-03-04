<?php 
 session_start();
$username = null;
$password = null;
$username_error = null;
$password_error = null;
$error = null;

  if(isset($_POST['submit'])){

    if(empty($_POST['username'])){
      $username_error = "username required*";
    }
    else{
      $username = htmlspecialchars($_POST['username']);
    }

    if(!empty($_POST['password']) && strlen($_POST['password']) < 6){
      $password_error = "password must be at last six characters";
    }
    else{
      $password = htmlspecialchars($_POST['password']);
    }

    if($username && $password){

      if($username == 'admin@gmail.com' && $password =='admin123'){

        $_SESSION['admin_username'] = $username;
        header("location:admin_dashboard.php");
      }
      else{
        $error = "invalid username or password";
      }

    }
  }

 ?>







<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login page</title>
    <link
      href="https://fonts.googleapis.com/css?family=Raleway"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/form.css">
  </head>
  <body>
    
    <div id="container" class="login">
      <div class="form-wrap">
        <h1>Sing In</h1>
        
        <div class="error">
          <p> <?php echo $username_error; ?></p>
          <p><?php echo $password_error; ?></p>
          <p><?php echo $error; ?></p>

        </div>

        <form action="" method="post"> 
            <div class="form-group">
            <label for="username">Username</label>
            <input type="email" name="username" value="<?php echo $username; ?>"required placeholder="example@email.com" >
            </div>
             <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" value="<?php echo $password; ?>" required>
            </div>
          <button type="submit" class="btn" name="submit">Login</button>
        </form>
      </div>
      <footer>
        <p>Not A Member? <a href="registration.php">Registation</a></p>
      </footer>
    </div>
   
  </body>
</html>

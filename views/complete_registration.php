<?php 
    
   session_start();
     $status =  $_GET['id'];
     $_SESSION['status']  = $status;
     if(!isset($status)){
        header("location:registration.php");
     }

    $phone_error = null;
    $nid_error = null;
    if(isset($_SESSION['phone_error'])){
    $phone_error = $_SESSION['phone_error'];
    unset($_SESSION['phone_error']);
   }
   if(isset($_SESSION['nid_error'])){
    $nid_error = $_SESSION['nid_error'];
    unset($_SESSION['nid_error']);
   }
 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>complete registration</title>
    <link rel="icon" href="../imgs/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
    <link rel="stylesheet" href="css/form.css">
    
</head>

<body>

    <div class="com-reg">
        <div class="form-wrap">
            <h1>Complete Registration</h1>

            <div class="error" style="text-align: center;">
                <p><?php echo "$phone_error"; ?></p>
                <p><?php echo "$nid_error"; ?></p>
              

            </div>

            <form id="form" action="../controllers/usersController.php" method="post" enctype="multipart/form-data">
              <div class="display">
                  <div class="form-group">
                      <label for="phoneNo">Phone No:</label>
                      <input type="number" name="phone"  id="phone">
                      <small id="small">Error</small>
                      
                  </div>
                  <div class="form-group ">
                      <label for="nid">NID:</label>
                      <input type="number" name="nid"  id="nid">
                      <small>Error Message</small>
                  </div>
                </div>
                <div class="display">
                  <div class="form-group">
                      <label for="dob">DOB</label></label>
                      <input type="date" name="dob"  id="dob"> 
                      <small>Error Message</small> 
                  </div>
                  <div class="form-group">
                      <label for="Address">Address:</label></label>
                      <input type="text" name="current_job" id="address"> <small>Error Message</small>
                  </div>
                </div>
                
                <div class="form-group">
                    <label for="gender">Gender:</label></label>
                   <div class="radio">
                       <div>
                         <input type="radio" name="gender" value="Male" required>Male
                       </div>
                       <div>
                         <input type="radio" name="gender" value="Female" required>Female
                       </div> 
                       <div>
                         <input type="radio" name="gender" value="Other" required>Other
                       </div> 
                   </div>
                </div>
                
                <div class="form-group">
                    <label for="about">About You:</label></label>
                    <textarea name="about" id="about" cols="60" rows="5" >
                    </textarea>
                    <small>Error Message</small>  
                </div>
                <div class="form-group">
                    <label for="profile-pic">Profile Picture:</label></label>
                    <input type="file" name="img" required> 
                </div>
                <button type="submit" class="btn" name="submit_reg" id="submit_button">Submit</button>
            </form>
        </div>
      
    </div>
  <script src="../controllers/js/formValidation.js"></script> 
</body>

</html>
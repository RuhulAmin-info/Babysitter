<?php 
    
    session_start();
    $status =  $_GET['id'];
    $_SESSION['status']  = $status;

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

            <div class="error">
                

            </div>

            <form action="../controllers/usersController.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="phoneNo">Phone No:</label>
                    <input type="number" name="phone" required>
                    
                </div>
                <div class="form-group">
                    <label for="nid">NID:</label>
                    <input type="number" name="nid" required>
                    
                </div>
                <div class="form-group">
                    <label for="dob">DOB</label></label>
                    <input type="date" name="dob" required>  
                </div>
                <div class="form-group">
                    <label for="payment">Current Job:</label></label>
                    <input type="text" name="current_job" required>  
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
                    <textarea name="about" id="" cols="60" rows="5" required>

                    </textarea>  
                </div>
                <div class="form-group">
                    <label for="profile-pic">Profile Picture:</label></label>
                    <input type="file" name="img"> 
                </div>
                <button type="submit" class="btn" name="submit_reg">Submit</button>
            </form>
        </div>
       
    </div>
</body>

</html>
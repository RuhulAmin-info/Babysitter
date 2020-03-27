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

            <form action="" method="post">
                <div class="form-group">
                    <label for="phoneNo">Phone No:</label>
                    <input type="number" require>
                    
                </div>
                <div class="form-group">
                    <label for="nid">NID:</label>
                    <input type="number" require>
                    
                </div>
                <div class="form-group">
                    <label for="dob">DOB</label></label>
                    <input type="date" require>  
                </div>
                <div class="form-group">
                    <label for="payment">Current Job:</label></label>
                    <input type="text" require>  
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label></label>
                   <div class="radio">
                       <div>
                         <input type="radio" name="gender" value="Male">Male
                       </div>
                       <div>
                         <input type="radio" name="gender" value="Female">Female
                       </div> 
                       <div>
                         <input type="radio" name="gender" value="Other">Other
                       </div> 
                   </div>
                </div>
                <div class="form-group">
                    <label for="about">About You:</label></label>
                    <textarea name="" id="" cols="60" rows="5">

                    </textarea>  
                </div>
                <div class="form-group">
                    <label for="profile-pic">Profile Picture:</label></label>
                    <input type="file">  
                </div>
                <button type="submit" class="btn" name="submit">Submit</button>
            </form>
        </div>
       
    </div>
</body>

</html>
<?php 
	require_once 'header.php';
	require_once '../controllers/adminController.php';
	$id = $_GET['id'];

	$admin = GetAdmin($id);
	$row = mysqli_fetch_assoc($admin);

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 	<link rel="stylesheet" href="css/dashboard.css">
 </head>
 <body>
 	<div>
 		<a href="admin_profile.php?id=<?php echo $id ?>">Go to Profile</a>
 	</div>
 	<div id="container">
            <div class="form-wrap">
                <h1>Update Profile</h1>

                <div class="error">
                
                </div>

                <form method="post" action="../controllers/adminController.php">
                <div class="display">
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input  type="text" id="fname" name="firstName" required value="<?php echo $row['firstName']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input type="text" id="lname" name="lastName"  required value="<?php echo $row['lastName']; ?>">
                    </div>
                </div>

                <div class="display">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required readonly value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Phone">Phone No</label>
                        <input type="number" id="phone" name="phone" required value="<?php echo $row['phone']; ?>">
                    </div>
                </div>

                <div class="display">
                    <div class="form-group">
                        <label for="Birth-date">Birth Date</label>
                        <input type="date" id="dob" name="birth_date" required value="<?php echo $row['dob']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nid">NID No</label>
                        <input type="number" id="nid" name="nid" required readonly value="<?php echo $row['nid']; ?>">
                    </div>
                </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" required value="<?php echo $row['address']; ?>">
                        </div>

                 <div class="display">
                        <div class="form-group">
                             <label for="zip-code">Zip</label>
                             <input type="number" id="zip" name="zip" required value="<?php echo $row['zip']; ?>">
                        </div>
                        <div class="form-group">
                             <label for="city">City</label>
                             <input type="text" id="city" name="city" required value="<?php echo $row['city']; ?>">
                        </div>
                </div>
               
                <button type="submit" id="update_btn" class="btn" name="update">Update</button>
     
                 
                </form>
                 
                
            </div>
         </div>
         
      </div>
    <?php 
    	require_once 'footer.php'
     ?>
     <script>
     	
     </script>
 </body>
 </html>
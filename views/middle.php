<?php 
        session_start();
    if(!isset($_SESSION['username'])){
        header("location:registration.php");
        //unset($_SESSION['username']);
    }


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Registration</title>
    <link rel="icon" href="../imgs/favicon.png">
    <link rel="stylesheet" href="css/middle.css">
</head>
<body>
      <h1>I am a</h1>
    <div class="container">
        
        <div class="parents">
            <a href="complete_registration.php?id=parents">parents</a>
        </div>
        <div class="babysitter">
            <a href="complete_registration.php?id=babysitter">Babysitter</a>
        </div>
    </div>  

</body>
</html>
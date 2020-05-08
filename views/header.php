<?php 

if(isset($_POST['logout'])){
    header('location:index.php');
}


 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Babysitter</title>
    <link rel="icon" href="../assets/imgs/favicon.png">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    <div class="navbar">
        <div>
            <h2>DASHBOARD</h2>
        </div>
        <div>
            <form action="" method="post">
                <input type="submit" name="logout" value="Logout" class="btn">
            </form>
            
        </div>
    </div>
</body>
</html>
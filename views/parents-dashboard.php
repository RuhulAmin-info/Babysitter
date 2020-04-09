<?php
require_once 'header.php';
require_once '../controllers/usersController.php';
//session_start();
if(!isset($_SESSION['parents_username'])){
    header("location:login.php");
 }
 $email = $_SESSION['parents_username'];


$id = GetId($email);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <link rel="stylesheet" href="css/user-dashboard.css">
</head>

<body>
    <div class="container">
        <div class="btn-main">
            <a href="user_profile.php?id=<?php echo $id; ?>">Profile</a>
        </div>
        <div class="btn-main">
            <a href="">All Babysitter</a>
        </div>
        <div class="btn-main">
            <a href="">Post Job</a>
        </div>
    </div>
    <div>
        <input type="text">
    </div>
    <div class="overview">
            <h1>Overview</h1>
    </div>
    <?php
        require_once 'footer.php';

    ?>
</body>
</html>
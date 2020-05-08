<?php
require_once 'header.php';
require_once '../controllers/usersController.php';
if(!isset($_SESSION['babysitter_username'])){
    header("location:login.php");
 }
  $email = $_SESSION['babysitter_username'];

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
            <a href="babysitter_profile.php?id=<?php echo $id; ?>">Profile</a>
        </div>
        <div class="btn-main">
            <a href="all-job.php">All Jobs</a>
        </div>
        <div class="btn-main">
            <a href="withdraw.php">Transition</a>
        </div>
    </div>
    <div class="overview">
            <h1>Overview</h1>
    </div>
    <?php
        require_once 'footer.php';

    ?>
</body>

</html>
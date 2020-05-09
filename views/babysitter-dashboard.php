<?php
require_once 'header.php';
require_once '../controllers/usersController.php';
require_once '../controllers/babysitterAccountController.php';
if(!isset($_SESSION['babysitter_username'])){
    header("location:login.php");
 }
  $email = $_SESSION['babysitter_username'];

$id = GetId($email);
$totalJobDone = JobDone($email);
$totalAvailable = AvailableJob();
$accountDet = AccountDetails($email);
$row = mysqli_fetch_assoc($accountDet);

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
       <div class="card">
          <h2>Total Available Job</h2>
          <h2><?php echo $totalAvailable; ?></h2>
        </div>
        <div class="card">
          <h2>Total Job Done</h2>
          <h2><?php echo $totalJobDone; ?></h2>
        </div>
        <div class="card">
          <h2>Total Balance</h2>
          <h3><?php echo $row["current_balance"]; ?></h3>
          <h2> BDT</h2>
        </div>     
    </div>
    <?php
        require_once 'footer.php';

    ?>

</body>

</html>
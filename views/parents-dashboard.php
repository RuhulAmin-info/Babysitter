<?php
require_once 'header.php';
require_once '../controllers/usersController.php';
//require_once'../controllers/parentsAccountController.php';
if(!isset($_SESSION['parents_username'])){
    header("location:login.php");
 }
 $email = $_SESSION['parents_username'];
 $account = GetAccountDetails($email);
 $accountData = mysqli_fetch_assoc($account);


$id = GetId($email);
$total_service_get = GetSercice($email);
$total_post = TotalPost($email);
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
            <a href="all-babysitter.php">All Babysitter</a>
        </div>
        <div class="btn-main">
            <a href="new-job.php?id=<?php echo $id; ?>">Post Job</a>
        </div>
        <div class="btn-main">
            <a href="mypost.php">My Posted Job</a>
        </div>
    </div>
    
    <div class="overview">
       <div class="card">
          <h2>Total Post</h2>
          <h2><?php echo "$total_post"; ?></h2>
        </div>
        <div class="card">
          <h2>Total service Get</h2>
          <h2><?php echo "$total_service_get"; ?></h2>
        </div>
        <div class="card">
          <h2>Total Balance</h2>
          <h2><?php echo $accountData['current_balance']; ?> BDT</h2>
        </div>     
    </div>
    <?php
        require_once 'footer.php';

    ?>
</body>
</html>
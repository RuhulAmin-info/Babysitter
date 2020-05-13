<?php 
require_once '../controllers/usersController.php';
if(!isset($_SESSION['parents_username'])){
    header("location:login.php");
 }
 $email = $_SESSION['parents_username'];
 $id = $_GET['id'];
 $_SESSION['getId'] = $id;
 
$account = GetAccountDetails($email);
$accountData = mysqli_fetch_assoc($account);

$current_balance = $accountData['current_balance'];
//echo $current_balance;
$message = null;
if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
 }
 
 ?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Job</title>
    <link rel="icon" href="../imgs/favicon.png">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>


    <div class="Job-post">
        
        <div id="container">
            <div class="form-wrap">
                <h1>New Job Post</h1>
                <p style="color: green"><?php echo $message; ?></p>
                <div id="show_message" style="text-align: center;color: red"></div>
                <form method="post" action="../controllers/postController.php">
                    <div class="form-group name">
                        <label for="title">Job Title</label>
                        <input type="text" name="job_title" required>
                    </div>
                    <div class="form-group name">
                        <label for="job-duration">Time Duration</label>
                        <input type="number" name="time-duration" required>
                    </div>
                    <div class="form-group name">
                        <label for="payment"> Total Payment</label>
                        <input type="number" id="payment" name="total_payment" required>
                    </div>

                    <div class="form-group">
                        <label for="job-details">Job Details</label>
                        <textarea name="job-details" id="" rows="7"></textarea>
                    </div>
                    <button type="submit" class="btn" id="button" name="sing_submit">Post</button>
                </form>
            </div>

        </div>


    </div>
    <?php require_once 'footer.php'; ?>
    <script>
    let error = false;
    let submit = document.getElementById('button');
    let currentBalance  = <?php echo "$current_balance"; ?>;
    submit.addEventListener('click',function(e){
        let payment = parseFloat(document.getElementById('payment').value); 
        if(payment>currentBalance){
            e.preventDefault();
            document.getElementById('show_message').innerText = 'Insufficient Balance';
        }
        
    })
    
    </script>
</body>

</html>
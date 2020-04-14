<?php 
require_once '../controllers/usersController.php';
if(!isset($_SESSION['parents_username'])){
    header("location:login.php");
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

                <form method="post">
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
                        <input type="number" name="total_payment" required>
                    </div>




                    <div class="form-group">
                        <label for="job-details">Job Details</label>
                        <textarea name="job-details" id="" rows="7"></textarea>
                    </div>
                    <button type="submit" class="btn" name="sing_submit">Post</button>
                </form>
            </div>

        </div>


    </div>
    <?php require_once 'footer.php'; ?>
</body>

</html>
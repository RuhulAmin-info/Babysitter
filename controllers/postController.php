<?php 
 session_start();
 require_once '../models/database.php';
if(isset($_POST['sing_submit'])){
	$id = $_SESSION['getId'];
	$username = $_SESSION['parents_username'];
	
	$title = htmlspecialchars($_POST['job_title']);
	$hour = htmlspecialchars($_POST['time-duration']);
	$payment = htmlspecialchars($_POST['total_payment']);
	$body = htmlspecialchars($_POST['job-details']);


	if($username && $title && $hour && $payment && $body){
		$sql = "INSERT INTO post (username,title,hour,payment,body) VALUES ('$username','$title','$hour','$payment','$body')";

		$result = insertData($sql);
		if($result){

		$sql = "SELECT * FROM account WHERE username='$username'";
		$result1 = getData($sql);
		$row = mysqli_fetch_assoc($result1);
		$balance = $row['current_balance'];
		$current_balance = $balance - $payment;
		$spend = $row['total_spend'];
		$total_spend = $spend + $payment;
		$sql1 = "UPDATE account SET total_spend='$total_spend',current_balance = '$current_balance' WHERE username = '$username'";
		$result2 = insertData($sql1);
		if($result2){
			$message = " Success\nYour post Under Review";
			$_SESSION['message'] = $message;
			header('location:../views/new-job.php?id='.$id);
			exit();
		}

			//header("location:../views/new-job.php");
			//$message = " Success\nYour post Under Review";

		}
	}
}


 function GetReviewPost(){
 	$sql = "SELECT * FROM post WHERE status = 'review'";
 	$result = getData($sql);

 	return $result;
 }

  function ActivePost(){
 	$sql = "SELECT * FROM post WHERE status = 'active'";
 	$result = getData($sql);

 	return $result;
 }

  function CompletePost(){
 	$sql = "SELECT * FROM post WHERE status = 'completed'";
 	$result = getData($sql);

 	return $result;
 }

 function MyPost($email){
 	$sql = "SELECT * FROM post WHERE username = '$email'";
 	$result = getData($sql);
 	return $result;
 }




 ?>
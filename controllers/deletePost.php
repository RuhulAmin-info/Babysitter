<?php 
require_once '../models/database.php';
$id = $_GET['id'];

	$sql = "SELECT * FROM post WHERE id = '$id'";
 	$data = getData($sql);
 	$row = mysqli_fetch_assoc($data);
 	$payment = $row['payment'];
 	$username = $row['username'];
 	$sql1 = "SELECT * FROM account WHERE username = 'username'";
 	$Account_Details = getData($sql1);
 	$Account_Data = mysqli_fetch_assoc($Account_Details);
 	$p_payment = $Account_Data['current_balance'];
 	$current_balance = $p_payment + $payment;
 	$p_spend = $Account_Data['total_spend'];
 	$total_spend = $p_spend - $payment;
 	$sql2 = "UPDATE account SET total_spend='$total_spend',current_balance = '$current_balance' WHERE username = '$username'";

 	$result2 = insertData($sql2);

	if($result2){
	 	
	 $sql = "DELETE FROM post WHERE id = '$id'";

	$result = insertData($sql);
	 if($result){
	  	header("location:../views/post.php");
	  }

	 	
	}
	else{
	 echo "Faild";
	 }



 ?>
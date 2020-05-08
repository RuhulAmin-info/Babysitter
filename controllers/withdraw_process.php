<?php 

require_once '../models/database.php';

$getData = file_get_contents("php://input");

$object = json_decode($getData,true);

$userName = $object['userName'];
$totalWithdraw  = $object['totalWithdraw'];
$currentBalance = $object['currentBalance'];
$passdata = array();

if($userName && $currentBalance && $totalWithdraw){
	$sql = "UPDATE baby_account SET current_balance = '$currentBalance',total_wid = '$totalWithdraw' WHERE username = '$userName'";
 	$result = insertData($sql);

 	if($result){
 		$sql1 = "SELECT * FROM baby_account WHERE username = '$userName'";
 		$result1 = getData($sql1);
 		$row = mysqli_fetch_assoc($result1);
 		//echo $row["current_balance"];
		$passdata[] = $row;
		$finalData = json_encode($passdata);
		echo "$finalData";
 	}else{
 		echo "Faild to update";
 	}
}else{
	echo "no value";
}


 ?>
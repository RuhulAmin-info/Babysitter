<?php 
require_once '../models/database.php';

$getData = file_get_contents("php://input");

$object = json_decode($getData,true);

$userName = $object['userName'];
$totalDeposit  = $object['totalDeposit'];
$totalSpend = $object['totalSpend'];
$currentBalance = $object['currentBalance'];
$passdata = array();

//echo "$userName $totalDeposit $totalSpend $currentBalance";

$sql = "SELECT * FROM account WHERE username='$userName'";
$result = getData($sql);
$row = mysqli_fetch_assoc($result);

if($row['username'] == $userName){
	$sql = "UPDATE account SET total_deposit='$totalDeposit',total_spend='$totalSpend',current_balance = '$currentBalance' WHERE username = '$userName'";
	$rseult = insertData($sql);
	if($result){
		$sql1 = "SELECT * FROM account  WHERE username = '$userName'";
		$data = getData($sql1);
		$row = mysqli_fetch_assoc($data);
		$passdata[] = $row;
		$finalData = json_encode($passdata);
		echo "$finalData";
	}
}else{
	$query = "INSERT INTO account (username,total_deposit,total_spend,current_balance) VALUES ('$userName','$totalDeposit','$totalSpend','currentBalance')";

		$rseult = insertData($sql);
	if($result){
		$sql1 = "SELECT * FROM account  WHERE username = '$userName'";
		$data = getData($sql1);
		$row = mysqli_fetch_assoc($data);
		$passdata[] = $row;
		$finalData = json_encode($passdata);
		echo "$finalData";
	}

}



 ?>
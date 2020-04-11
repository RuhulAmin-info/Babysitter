<?php 
require_once '../models/database.php';

	
	$getData = file_get_contents("php://input");

	$object = json_decode($getData,true);

	$id = $object['Id'];
	$fName = $object['fName'];
	$lName = $object['lName'];
	$email = $object['Email'];
	$phone = $object['Phone'];
	$dob = $object['Dob'];
	$nid = $object['Nid'];
	$address = $object['Address'];
	$zip = $object['Zip'];
	$city = $object['City'];

	//echo "$id $fName $lName $email $phone $dob $nid  $address $zip $city";

	if($id && $fName && $lName && $email && $phone && $dob && $nid && $address && $zip && $city){
		$sql = "UPDATE admin SET firstName = '$fName',lastName='$lName',email='$email',dob = '$dob',phone = '$phone', nid='$nid',address='$address',zip = '$zip',city = '$city' WHERE id = '$id'";

		$result = insertData($sql);
		if($result){
			echo "Profile Update Successfully";
		}
		else{
			echo "Server error,Faild to update";
		}
		
	}
	else{
		echo "Not proper Info";
	}

	

 ?>
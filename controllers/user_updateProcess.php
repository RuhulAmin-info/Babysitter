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
	$Gender = $object['Gender'];
	$Type = $object['Type'];
	$About = $object['About'];

	//echo "$id $fName $lName $email $phone $dob $nid  $address $Gender $Type $About";

	if($id && $fName && $lName && $email && $phone && $dob && $nid && $address && $Gender && $Type && $About){
		$sql = "UPDATE users SET firstName = '$fName',lastName='$lName',email='$email',phone = '$phone', nid='$nid',dob = '$dob',address='$address',status = '$Type',gender = '$Gender',about = '$About' WHERE id = '$id'";

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
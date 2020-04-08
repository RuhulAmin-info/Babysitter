<?php 
require_once '../models/database.php';
$id = $_GET['id'];

 $sql = "UPDATE users SET profileStatus = 'active' WHERE id='$id'";

 $result = insertData($sql);

 if($result){
 	header("location:../views/all-users.php");
 }
 else{
 	echo "Faild";
 }



 ?>
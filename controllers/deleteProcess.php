<?php 
require_once '../models/database.php';
$id = $_GET['id'];

 $sql = "SELECT * FROM users WHERE id='$id'";

 $result = getData($sql);

 $row = mysqli_fetch_assoc($result);

 $userName = $row['email'];
  $query_user = "DELETE FROM users WHERE id = '$id'";
  insertData($query_user);
  $query = "DELETE FROM login WHERE username ='$userName'";
  $log_delete = insertData($query);

  if($log_delete){
  	header("location:../views/all-users.php");
  }
  else{
  	echo "Faild";
  }
 
 /*
 if($userName){
 	$query = "DELETE FROM login WHERE username ='$userName'";
 	$log_delete = insertData($query);
 	if($log_delete){
 		$query_user = "DELETE FROM users WHERE email ='$userName'";
 		$user_delete = insertData($query_user);
 		if($user_delete){
 			header("location:../views/all-users.php");
 		}
 		else{
 			echo "faild for id";
 		}
 	}
 }
 else{
 	echo "faild";
 }
*/

 ?>
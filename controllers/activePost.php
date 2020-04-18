<?php 
require_once '../models/database.php';
$id = $_GET['id'];

 $sql = "UPDATE post SET status = 'active' WHERE id='$id'";

 $result = insertData($sql);

 if($result){
 	header("location:../views/post.php");
 }
 else{
 	echo "Faild";
 }



 ?>
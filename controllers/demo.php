<?php 
require_once '../models/database.php';
session_start();

if(isset($_POST['update_pic_bs']))
{
    $username = $_SESSION['babysitter_username'];
    $id = $_SESSION['babysitter_id'];
    $type = 'babysitter';
    $table = 'users';
    UpdateProfilePic($username, $id, $type,$table);
}



function UpdateProfilePic($username, $id, $type,$table){
	 $sql = "UPDATE `" . $table . "` SET profile_pic = 'Hello' WHERE email='$username' ";
     $result = insertData($sql);
}

?>
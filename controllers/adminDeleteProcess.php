<?php
session_start();
require_once '../models/database.php';
$log_user = $_SESSION['admin_username'];

$id = $_GET['id'];

$sql = "SELECT * FROM admin WHERE id='$id'";

$result = getData($sql);

$row = mysqli_fetch_assoc($result);

$userName = $row['email'];

if ($log_user == $userName)
{
    $_SESSION['dele_error'] = 'You can not delete yourself';
    header("location:../views/all-admin.php");
    exit();
}
else
{
    $query_user = "DELETE FROM admin WHERE id = '$id'";
    insertData($query_user);
    $query = "DELETE FROM login WHERE username ='$userName'";
    $log_delete = insertData($query);
    if ($log_delete)
    {
        header("location:../views/all-admin.php");
    }
    else
    {
        $_SESSION['dele_error'] = 'Faild to delete';
        header("location:../views/all-admin.php");
        exit();
    }
}

?>

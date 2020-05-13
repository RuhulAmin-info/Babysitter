<?php
require_once '../models/database.php';
if (!isset($_SESSION))
{
    session_start();
}
$email = null;
// $id = $_GET['id'];
if (isset($_POST['submit']))
{
    $id = $_GET['id'];
    $email = htmlspecialchars($_POST['email']);
    $sql = "SELECT * FROM login WHERE username = '$email'";
    $result = getData($sql);
    if (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        if ($row['status'] == 'babysitter')
        {
            $sql = "SELECT * FROM post WHERE id = '$id'";
            $result = getData($sql);
            if (mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);
                $status = $row['status'];
                $money = $row['payment'];
                if ($status == 'active')
                {
                    //write code here
                    $query = "SELECT * FROM baby_account WHERE username = '$email'";
                    $data = getData($query);
                    if (mysqli_num_rows($data) > 0)
                    {
                        $row = mysqli_fetch_assoc($data);
                        $current_balance = $row['current_balance'];
                        $newbalance = $current_balance + $money;
                        $withdraw = $row['total_wid'];
                        // get current money and update data
                        $sql = "UPDATE post SET status = 'completed',done_by= '$email' WHERE id = '$id'";
                        $result = insertData($sql);

                        if ($result)
                        {
                            if (Update($email, $newbalance, $withdraw))
                            {
                                $_SESSION['p_error'] = "Success";
                                header("location:../views/mypost.php");
                            }
                            else
                            {
                                $_SESSION['p_error'] = "Faild";
                                header("location:../views/mypost.php");
                            }
                        }

                    }
                    else
                    {
                        //inser data in database
                        if (Insert($email, $money, 0))
                        {
                            $sql = "UPDATE post SET status = 'completed',done_by='$email' WHERE id = '$id'";
                            $result = insertData($sql);
                            $_SESSION['p_error'] = "Success";
                            header("location:../views/mypost.php");
                        }
                        else
                        {
                            $_SESSION['p_error'] = "Faild";
                            header("location:../views/mypost.php");
                        }
                    }

                }
                else
                {
                    $_SESSION['p_error'] = "Your Post is not active";
                    header("location:../views/mypost.php");
                }

            }
        }
        else
        {
            $_SESSION['p_error'] = "User is not babysitter";
            header("location:../views/mypost.php");
        }
    }
    else
    {
        $_SESSION['p_error'] = "User Not Found";
        header("location:../views/mypost.php");
    }
    ////
    
}

function Insert($username, $current_balance, $total_wid)
{
    $sql = "INSERT INTO baby_account (username,current_balance,total_wid) VALUES ('$username', '$current_balance','$total_wid')";
    $result = insertData($sql);

    return $result;
}

function Update($username, $current_balance, $total_wid)
{
    $sql = "UPDATE baby_account SET current_balance = '$current_balance',total_wid = '$total_wid' WHERE username = '$username'";
    $result = insertData($sql);

    return $result;
}

function AccountDetails($email)
{
    $sql = "SELECT * FROM baby_account WHERE username = '$email'";
    $result = getData($sql);
    return $result;
}
?>

<?php
require_once '../models/database.php';
session_start();
 
if (isset($_POST['update_pic']))
{
    $username = $_SESSION['admin_username'];
    $id = $_SESSION['admin_id'];
    $type = 'admin';
    $table = 'admin';
    UpdateProfilePic($username, $id, $type,$table);

}

if(isset($_POST['update_pic_bs']))
{
    $username = $_SESSION['babysitter_username'];
    $id = $_SESSION['babysitter_id'];
    $type = 'babysitter';
    $table = 'users';
    UpdateProfilePic($username, $id, $type,$table);
}

if(isset($_POST['update_pic_pa']))
{
    $username = $_SESSION['parents_username'];
    $id = $_SESSION['parents_id'];
    $type = 'parents';
    $table = 'users';
    UpdateProfilePic($username, $id, $type,$table);
}

function UpdateProfilePic($username, $id, $type,$table)
{

    $img = $_FILES['img'];
    $imgName = $_FILES['img']['name'];
    $imgTmp_der = $_FILES['img']['tmp_name'];
    $imgSize = $_FILES['img']['size'];
    $imgError = $_FILES['img']['error'];

    $imgExt = explode('.', $imgName);
    $imgActualExt = strtolower(end($imgExt));
    $allowed = array(
        'jpg',
        'jpeg',
        'png'
    );
    if (in_array($imgActualExt, $allowed))
    {
        if ($imgError === 0)
        {
            $ImgNewName = uniqid("", true) . "." . $imgActualExt;
            $Img_location = '../assets/uploads/' . $ImgNewName;
            if (move_uploaded_file($imgTmp_der, $Img_location))
            {

                $sql = "UPDATE `" . $table . "` SET profile_pic = '$Img_location' WHERE email='$username' ";
                $result = insertData($sql);
                if ($result)
                {
                    if ($type == 'admin')
                    {
                        header('location:../views/admin_profile.php?id=' . $id);
                    }
                    else if ($type == 'babysitter')
                    {
                        header('location:../views/babysitter_profile.php?id=' . $id);
                    }
                    else
                    {
                        header('location:../views/user_profile.php?id=' . $id);
                    }

                }
                else
                {
                    echo "Faild";
                }
            }
            else
            {
                echo "Faild";
            }

        }
        else
        {
            echo "There was a error in your file";
        }
    }
    else
    {
        echo "You cannot upload this type of file!";
    }

}

?>

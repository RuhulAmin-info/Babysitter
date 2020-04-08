<?php 

require_once'../controllers/adminController.php';

$allAdmins = GetAllAdmin();

//print_r($reviewUsers);





 ?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <link rel="icon" href="../imgs/favicon.png">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <div class="user-table">

        <h3>Admin Table</h3>
        <div class="table_box">
            <div class="table_row table_head">
                <div class="table_cell ">
                    <p>Name</p>
                </div>
                <div class="table_cell">
                    <p>username</p>
                </div>
                <div class="table_cell">
                    <p>phone</p>
                </div>
                <div class="table_cell">
                    <p>Action</p>
                </div>

            </div>
            
            <?php

               foreach ($allAdmins as $admin) {
                      # code...
                   
               echo "<div class='table_row'>"; 
                   echo "<div class='table_cell'>"; 
                       echo "<p>".$admin["firstName"]."</p>";
                    echo "</div>";

                     echo "<div class='table_cell'>"; 
                       echo "<p>".$admin["email"]."</p>";
                    echo "</div>";
                    
                     echo "<div class='table_cell'>"; 
                       echo "<p>".$admin["phone"]."</p>";
                    echo "</div>";
                    
                    echo "<div class='table_cell'>";
                        echo "<div class='O-btn'>";

                            echo "<div class='Delete-Btn'>";
                                echo '<a href="">Delete</a>';
                            echo "</div>";
                        echo "</div>";

                  echo "</div>"; 
                  
               echo "</div>";
               } 
            ?>
            
           
        </div>


    </div>
    <?php require_once 'footer.php'; ?>
</body>

</html>
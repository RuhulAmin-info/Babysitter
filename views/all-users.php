<?php 

require_once'../controllers/usersController.php';

$reviewUsers = GetReviewUser();
$activeUsers =  ActiveUser();
$deactiveUsers = DeactiveUser();

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

  <!-- review User table -->
    <div class="user-table">

        <h3>User Table</h3>
        <p style="text-align: center;">[wating for Approval]</p>
        <div class="table_box">
            <div class="table_row table_head">
                <div class="table_cell ">
                    <p>username</p>
                </div>
                <div class="table_cell">
                    <p>Phone</p>
                </div>
                <div class="table_cell">
                    <p>Type</p>
                </div>
                <div class="table_cell">
                    <p>Action</p>
                </div>

            </div>
            
            <?php

               foreach ($reviewUsers as $reviewUser) {
                      # code...
                   
               echo "<div class='table_row'>"; 
                   echo "<div class='table_cell'>"; 
                       echo "<p>".$reviewUser["email"]."</p>";
                    echo "</div>";

                     echo "<div class='table_cell'>"; 
                       echo "<p>".$reviewUser["phone"]."</p>";
                    echo "</div>";
                    
                     echo "<div class='table_cell'>"; 
                       echo "<p>".$reviewUser["status"]."</p>";
                    echo "</div>";
                    
                    echo "<div class='table_cell'>";
                        echo "<div class='O-btn'>";
                            echo "<div class='Update-Btn'>";
                               echo '<a href="../controllers/approveProcess.php?id='.$reviewUser['id'].'">Approve</a>'; 
                            echo "</div>";

                            echo "<div class='Delete-Btn'>";
                                echo '<a href="../controllers/deleteProcess.php?id='.$reviewUser['id'].'">Delete</a>';
                            echo "</div>";
                        echo "</div>";

                  echo "</div>"; 
                  
               echo "</div>";
               } 
            ?>
            
           
        </div>
    </div>


<!-- active User table -->

    
    <div class="user-table">

        <h3>User Table</h3>
        <p style="text-align: center;">[Active User]</p>
        <div class="table_box">
            <div class="table_row table_head">
                <div class="table_cell ">
                    <p>username</p>
                </div>
                <div class="table_cell">
                    <p>Phone</p>
                </div>
                <div class="table_cell">
                    <p>Type</p>
                </div>
                <div class="table_cell">
                    <p>Action</p>
                </div>

            </div>
            
            <?php

               foreach ($activeUsers as $activeUser) {
                      # code...
                   
               echo "<div class='table_row'>"; 
                   echo "<div class='table_cell'>"; 
                       echo "<p>".$activeUser["email"]."</p>";
                    echo "</div>";

                     echo "<div class='table_cell'>"; 
                       echo "<p>".$activeUser["phone"]."</p>";
                    echo "</div>";
                    
                     echo "<div class='table_cell'>"; 
                       echo "<p>".$activeUser["status"]."</p>";
                    echo "</div>";
                    
                    echo "<div class='table_cell'>";
                        echo "<div class='O-btn'>";
                            echo "<div class='Update-Btn'>";
                               echo '<a href="../controllers/deactiveProcess.php?id='.$activeUser['id'].'">Deactive</a>'; 
                            echo "</div>";

                            echo "<div class='Delete-Btn'>";
                                echo '<a href="../controllers/deleteProcess.php?id='.$activeUser['id'].'">Delete</a>';
                            echo "</div>";
                        echo "</div>";

                  echo "</div>"; 
                  
               echo "</div>";
               } 
            ?>
            
           
        </div>


    </div>


  <!-- Deactive User table -->


    <div class="user-table">

        <h3>User Table</h3>
        <p style="text-align: center;">[Deactive User]</p>
        <div class="table_box">
            <div class="table_row table_head">
                <div class="table_cell ">
                    <p>username</p>
                </div>
                <div class="table_cell">
                    <p>Phone</p>
                </div>
                <div class="table_cell">
                    <p>Type</p>
                </div>
                <div class="table_cell">
                    <p>Action</p>
                </div>

            </div>
            
            <?php

               foreach ($deactiveUsers as $deactiveUser) {
                      # code...
                   
               echo "<div class='table_row'>"; 
                   echo "<div class='table_cell'>"; 
                       echo "<p>".$deactiveUser["email"]."</p>";
                    echo "</div>";

                     echo "<div class='table_cell'>"; 
                       echo "<p>".$deactiveUser["phone"]."</p>";
                    echo "</div>";
                    
                     echo "<div class='table_cell'>"; 
                       echo "<p>".$deactiveUser["status"]."</p>";
                    echo "</div>";
                    
                    echo "<div class='table_cell'>";
                        echo "<div class='O-btn'>";
                            echo "<div class='Update-Btn'>";
                               echo '<a href="../controllers/approveProcess.php?id='.$deactiveUser['id'].'">Active</a>'; 
                            echo "</div>";

                            echo "<div class='Delete-Btn'>";
                                echo '<a href="../controllers/deleteProcess.php?id='.$deactiveUser['id'].'">Delete</a>';
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
<?php 

require_once'../controllers/postController.php';

$reviewPosts = GetReviewPost();
$activePosts =  ActivePost();
$completePosts = CompletePost();

//print_r($reviewUsers);


 ?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link rel="icon" href="../imgs/favicon.png">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>

  <!-- review User table -->
    <div class="user-table">

        <h3>Post Table</h3>
        <p style="text-align: center;">[wating for Approval]</p>
        <div class="table_box">
            <div class="table_row table_head">
                <div class="table_cell ">
                    <p>username</p>
                </div>
                <div class="table_cell">
                    <p>Title</p>
                </div>
                <div class="table_cell">
                    <p>Hour</p>
                </div>
                <div class="table_cell">
                    <p>Action</p>
                </div>

            </div>
            
            <?php

               foreach ($reviewPosts as $reviewPost) {
                      # code...
                   
               echo "<div class='table_row'>"; 
                   echo "<div class='table_cell'>"; 
                       echo "<p>".$reviewPost["username"]."</p>";
                    echo "</div>";

                     echo "<div class='table_cell'>"; 
                       echo "<p>".$reviewPost["title"]."</p>";
                    echo "</div>";
                    
                     echo "<div class='table_cell'>"; 
                       echo "<p>".$reviewPost["hour"]."</p>";
                    echo "</div>";
                    
                    echo "<div class='table_cell'>";
                        echo "<div class='O-btn'>";
                            echo "<div class='Update-Btn'>";
                               echo '<a href="../controllers/activePost.php?id='.$reviewPost['id'].'">Approve</a>'; 
                            echo "</div>";

                            echo "<div class='Delete-Btn'>";
                                echo '<a href="../controllers/deletePost.php?id='.$reviewPost['id'].'">Delete</a>';
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

        <h3>Post Table</h3>
        <p style="text-align: center;">[Active User]</p>
        <div class="table_box">
            <div class="table_row table_head">
                <div class="table_cell ">
                    <p>username</p>
                </div>
                <div class="table_cell">
                    <p>Title</p>
                </div>
                <div class="table_cell">
                    <p>Hour</p>
                </div>
                

            </div>
            
            <?php

               foreach ($activePosts as $activePost) {
                      # code...
                   
               echo "<div class='table_row'>"; 
                   echo "<div class='table_cell'>"; 
                       echo "<p>".$activePost["username"]."</p>";
                    echo "</div>";

                     echo "<div class='table_cell'>"; 
                       echo "<p>".$activePost["title"]."</p>";
                    echo "</div>";
                    
                     echo "<div class='table_cell'>"; 
                       echo "<p>".$activePost["hour"]."</p>";
                    echo "</div>";
                    
                  //   echo "<div class='table_cell'>";
                  //       echo "<div class='O-btn'>";
                  //           echo "<div class='Update-Btn'>";
                  //              echo '<a href="../controllers/deactiveProcess.php?id='.$activeUser['id'].'">Deactive</a>'; 
                  //           echo "</div>";

                  //           echo "<div class='Delete-Btn'>";
                  //               echo '<a href="../controllers/deleteProcess.php?id='.$activeUser['id'].'">Delete</a>';
                  //           echo "</div>";
                  //       echo "</div>";

                  // echo "</div>"; 
                  
               echo "</div>";
               } 
            ?>
            
           
        </div>


    </div>


  <!-- complete job table -->


    <div class="user-table">

        <h3>PostTable</h3>
        <p style="text-align: center;">[complete job]</p>
        <div class="table_box">
            <div class="table_row table_head">
                <div class="table_cell ">
                    <p>username</p>
                </div>
                <div class="table_cell">
                    <p>Title</p>
                </div>
                <div class="table_cell">
                    <p>Hour</p>
                </div>
                

            </div>
            
            <?php

               foreach ($completePosts as $completePost) {
                      # code...
                   
               echo "<div class='table_row'>"; 
                   echo "<div class='table_cell'>"; 
                       echo "<p>".$completePost["username"]."</p>";
                    echo "</div>";

                     echo "<div class='table_cell'>"; 
                       echo "<p>".$completePost["title"]."</p>";
                    echo "</div>";
                    
                     echo "<div class='table_cell'>"; 
                       echo "<p>".$completePost["hour"]."</p>";
                    echo "</div>";
                    
                  //   echo "<div class='table_cell'>";
                  //       echo "<div class='O-btn'>";
                  //           echo "<div class='Update-Btn'>";
                  //              echo '<a href="../controllers/approveProcess.php?id='.$deactiveUser['id'].'">Active</a>'; 
                  //           echo "</div>";

                  //           echo "<div class='Delete-Btn'>";
                  //               echo '<a href="../controllers/deleteProcess.php?id='.$deactiveUser['id'].'">Delete</a>';
                  //           echo "</div>";
                  //       echo "</div>";

                  // echo "</div>"; 
                  
               echo "</div>";
               } 
            ?>
            
           
        </div>


    </div>











    <?php require_once 'footer.php'; ?>
</body>

</html>
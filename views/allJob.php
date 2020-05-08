<?php 
 require_once 'header.php';
 require_once '../controllers/postController.php';
 //$email = $_GET['id'];
 if(!isset($_SESSION['babysitter_username'])){
    header("location:login.php");
 }
 // $email = $_SESSION['parents_username'];

  $allposts = ActivePost();


 
 ?>

 <!DOCTYPE html>
 <head>
 	<title>my post</title>
 	<link rel="stylesheet" href="css/mypost.css">
 </head>
 <body>
 	
 	<h2>My All Post</h2>
 	<div class="container">
 		<?php 
 			foreach ($allposts as $post) {
 				$x = $post["id"];
 				echo '<div class="post">';
 					echo '<h4>'.$post["title"] . '</h4>';
 					echo '<div class="post-body">';
 						echo '<p>'.$post["body"] . '</p>';
 					echo '</div>';
 					echo '<div>';
 						echo '<span>'.$post["hour"] .' H'.'</span>' .' | '.'<span id="payment-ammount">'.$post["payment"] .' BDT'.'</span>';
 					echo '</div>';
 					echo '<h4>'.$post["status"] . '</h4>';
 					echo '<form action="../controllers/babysitterAccountController.php?id='.$x.'" method = "post">';
 						echo '<input type="email" name="email" placeholder="Who complete.? | write email" required>';
 						echo '<input class="btn-com" type="submit" name = "submit" value="Make Completed">';
 					echo '</form>';

 				echo '</div>';
 			}

 		 ?>
 	</div>
 </body>
 </html>
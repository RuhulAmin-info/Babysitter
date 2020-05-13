
<?php 
session_start();

if(isset($_POST['submit'])){
 
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);
    

  if($name && $email && $message){
    $email_get = 'ruhulinfo50@gmail.com';
    $to = $email_get;
    $subject = "Contract";
    $message_body = $message;

    $headers = 'From: '.$email. "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    if(mail($email_get, $subject, $message_body,$headers)){
      $_SESSION['e_message'] = "Message Sent.Thank you for contact";
      header('location:../views/contact.php');
      exit();
    }
    else{
       $_SESSION['e_message'] = "Faild try again later";
      header('location:../views/contact.php');
      exit();
    }

    
  }
  else{
    echo "all variable not get";
    header('location:../views/contact.php');
    exit();
  }
  
}


 ?>
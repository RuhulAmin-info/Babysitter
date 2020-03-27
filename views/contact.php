
<?php 

$name = null;
$name_error = null;
$email = null;
$email_error = null;
$message = null;
$message_error = null;
$success = null;

if(isset($_POST['submit'])){
  if(empty($_POST['name'])){
    $name_error = "Name Required";
  }
  else{
    $name = htmlspecialchars($_POST['name']);
  }
  if(empty($_POST['email'])){
    $email_error = "Email Required";
  }
  else{
    $email = htmlspecialchars($_POST['email']);
  }

  if(empty($_POST['message'])){
    $message_error = "Write Your Proper Message";
  }
  else{
    $message = htmlspecialchars($_POST['message']);
  }

  if($name && $email && $message){
    $success = "Message sent!.Thank You for connact us.";
  }
  
}


 ?>






<!DOCTYPE html>
<html>
<head>
    
  <title>Contact</title>
  <link rel="icon" href="../imgs/favicon.png">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/contact.css">
</head>
<body>

  <section id="contact-form" class="py-3">
    <div class="container">
      <h1 class="l-heading"><span class="text-primary">Contact</span> Us</h1>
      <p>Please fill out the form below to contact us</p>
      <div class="error">
          <p><?php echo $name_error; ?></p>
          <p><?php echo $email_error; ?></p>
          <p><?php echo $message_error; ?></p>
          <p style="color: green;"><?php echo $success; ?></p>
      </div>
      <form action="" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea name="message" id="message"></textarea>
        </div>
        <button type="submit"  name="submit" class="btn">Submit</button>
      </form>
    </div>
  </section>

  <section id="contact-info" class="bg-dark">
    <div class="container">
        <div class="box">
            
            <i class="fas fa-building fa-3x"></i>
            <h3>Location</h3>
            <p>Kuratoli-Khilkhet, Dhaka-1229</p>
          </div>
          <div class="box">
              <i class="fas fa-phone fa-3x"></i>
              <h3>Phone Number</h3>
              <p>+880 XXXXXXXXXX</p>
          </div>
          <div class="box">
              <i class="fas fa-envelope fa-3x"></i>
              <h3>Email Address</h3>
              <p>babysitterbd@gmail.com</p>
          </div>
    </div>
  </section>
</body>
</html>
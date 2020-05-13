<?php 
session_start();
$message = null;
if(isset($_SESSION['e_message'])){
    $message = $_SESSION['e_message'];
    unset($_SESSION['e_message']);
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
      <p><?php echo $message; ?></p>
      <h1 class="l-heading"><span class="text-primary">Contact</span> Us</h1>
      <p>Please fill out the form below to contact us</p>
      <div id ="error" >
        <small id="n-error"></small>
        <small id="e-error"></small>
        <small id="m-error"></small>
      </div>
      <form action="../controllers/controctController.php" method="post">
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
        <button type="submit"  id="submit_cont" name="submit" class="btn">Submit</button>
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
  <script>
    let button = document.getElementById('submit_cont');
    button.addEventListener('click', function(e){
      let name = document.getElementById('name').value;
      let email = document.getElementById('email').value;
      let message = document.getElementById('message').value;
      if(name.trim() ===''){
        e.preventDefault();
        document.getElementById("error").style.display = "block";
        document.getElementById('n-error').innerText = 'Name Require*|';
      }
      if(email.trim() ===''){
        e.preventDefault();
        document.getElementById("error").style.display = "block";
        document.getElementById('e-error').innerText = 'Email Require*|';
      }

      if(message.trim() ===''){
        e.preventDefault();
        document.getElementById("error").style.display = "block";
        document.getElementById('m-error').innerText = 'Message Require*';
      }
    })
    
  </script>
</body>
</html>
<?php 

$message_error = null;
$success = null;
$name = null;
$email = null;
$message = null;

if(isset($_POST['submit'])){
	if(empty($_POST['message'])){
		$message_error = "Write Something First";
	}
	else{
		$message = htmlspecialchars($_POST['message']);
	}

	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);

	if($name && $email && $message){
		$success = "Message Send!";
	}
	else{
		$success = "Faild";
	}



}


 ?>




<!DOCTYPE html>
<head>

	<title>Bayasitter-Service</title>
	<link rel="icon" href="imgs/favicon.png">
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

</head>

<body>
	<nav id="navber">
		<h1 class="logo">
			<span class="logo-text">
				<i class="fab fa-buffer"></i> Baby
			</span>Sitter
		</h1>
		<ul>
			<li> <a href="">Home</a></li>
			<li> <a href="#who">Who</a></li>
			<li> <a href="#what">What</a></li>
			<li> <a href="#why">Why</a></li>
			<li> <a href="php/login.php">Login</a></li>
			<li> <a href="php/registration.php">Get Start</a></li>
		</ul>
	</nav>
	<div id="header-showcase">
		<div class="full">
			<div class="header-text">

				<h1>Wellcome <span>To</span>
				</h1>
				<h2 class="m-headding">Babysitting Service Center</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic modi ea animi odio, voluptatibus officiis repellat eius id ipsa sapiente suscipit eos architecto nesciunt culpa ducimus nihil doloremque vitae pariatur?</p>

			</div>
			<a href="php/registration.php" class="start-btn">Start Now</a>
		</div>
	</div>

	<section id="why">
		<div class="why-img">
			<img src="imgs/why.jpg" alt="">
		</div>
		<div class="why-text">
			<h1>Why</h1>
			
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro qui consectetur cumque. Fugiat molestiae facere in fugit aliquid sapiente magni, ea minus quos minima vero dolorem, pariatur, inventore explicabo nostrum.</p>
		</div>
	</section>


	<section id="what">
		<div class="what-text">
			<h1>Value</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro qui consectetur cumque. Fugiat molestiae facere in fugit aliquid sapiente magni, ea minus quos minima vero dolorem, pariatur, inventore explicabo nostrum.</p>
		</div>
		<div class="what-img">


			<img src="imgs/value.jpg" alt="">
		</div>
	</section>


	<section id="value">
		<div class="value-img">
			<img src="imgs/what.jpg" alt="">
		</div>
		<div class="value-text">
			<h1>What</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro qui consectetur cumque. Fugiat molestiae facere in fugit aliquid sapiente magni, ea minus quos minima vero dolorem, pariatur, inventore explicabo nostrum.</p>
		</div>
	</section>




	<section id="who">

		<div class="wrapper">
			<h2>We Are</h2>

			<div class="our_team">

				<div class="team_member">
					<div class="team_img">
						<img src="imgs/ruhul.png" alt="">
					</div>
					<h3>Ruhul Amin</h3>
					<p class="role">Developer</p>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, quia! Velit reiciendis odio veritatis non.
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, quia! Velit reiciendis odio veritatis non.

					</p>
				</div>
				<div class="team_member">
					<div class="team_img">
						<img src="imgs/shity.png" alt="">
					</div>
					<h3>Rati Islam</h3>
					<p class="role">Developer</p>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, quia! Velit reiciendis odio veritatis non.
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, quia! Velit reiciendis odio veritatis non.
					</p>
				</div>
				<div class="team_member">
					<div class="team_img">
						<img src="imgs/muaj.png" alt="">
					</div>
					<h3>Muaj Matiur</h3>
					<p class="role">Developer</p>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, quia! Velit reiciendis odio veritatis non.
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, quia! Velit reiciendis odio veritatis non.
					</p>
				</div>



			</div>

		</div>

	</section>
	<div class="footer">
		<div class="f-1 contact">
			<h2>Company & Resources</h2>
			
			<ul>
				<li><a href="">About Us</a></li>
				<li><a href="php/contact.php">Contact Us</a></li>
				<li><a href="php/trems.php">Trems & Condition</a></li>
				<li><a href="">Contact us</a></li>
				<li><a href="">Privacy Policy</a></li>
				<li><a href="">Customer Support</a></li>
				<li><a href="">Find Jobs</a></li>
				<li><a href="">Review</a></li>
			</ul>




		</div>
		<div class="f-1 contact">
			<h2>Mission & Vission</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed pariatur nisi, vel. Minima, culpa tempore libero aspernatur consequatur ratione distinctio! Asperiores dolores, tempora neque, aperiam explicabo quidem temporibus voluptas, sunt velit, non pariatur et? Ut.</p>
		</div>
		<div class="contact f-1 ">
			<h2>What's your Mind?</h2>
			<div class="error">
				<p><?php echo $message_error; ?></p>
				<p style="color: green;"><?php echo $success; ?></p>
			</div>
			<form action="" method="post">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" value="" required>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" value="" required>
				</div>
				<div class="form-group">
					<label for="message">Message</label>
					<textarea name="message" id="" rows="7"></textarea>
				</div>

				<button type="submit" class="btn" name="submit">Send Message</button>
			</form>
		</div>
	</div>
	</div>
	<div class="copy-right">
		<p>©ruhul2020, all rights reserved</p>
	</div>

</body>

</html>
<?php
   include 'db.php';
   if(isset($_SESSION['id'])) header("location:home.php");
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login and Registration Form in HTML</title>
      <link rel="stylesheet" href="assets/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
       
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="sweetalert2.min.css">


   </head>
   <body>
   <script src="script.js"></script>
   <div class="containers" id="containers">
       <section aria-label="Floating Logo">
            <div class="tilt">
              <h2>S</h2>
              <h2>P</h2>
              <h2>A</h2>
              <h2>C</h2>
              <h2>E</h2>
              <h2>A</h2>
              <h2>D</h2>
              <h2>V</h2>
              <h2>E</h2>
              <h2>N</h2>
              <h2>T</h2>
              <h2>U</h2>
              <h2>R</h2>
              <h2>E</h2>
            </div>
          </section>
   <div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#" id="SIGNUPFORM">
			<h1>Create Account</h1>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Username" name="username" autocomplete="off" />
			<input type="password" placeholder="Password" name="password" autocomplete="off"/>
			<input type="text" placeholder="Full Name" name="name" autocomplete="off" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#" id="LoginForm">
			<h1>Sign in</h1>
			<span>Login to your account</span>
			<input type="text" placeholder="Username"  name="Login_user" autocomplete="off" id="login_user"/>
			<input type="password" placeholder="Password" name="login_password" autocomplete="off" />
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>


</div>
<lottie-player src="https://assets5.lottiefiles.com/packages/lf20_Ns4TLz.json"  background="transparent"  speed="1"  style="width: 600px; height: 600px; margin-left: 150px; margin-top: 130px;"  loop  autoplay></lottie-player>


<footer>
	<p>Developed By Kiagus Ahmad Farhan Aziz</p>
</footer>

   </div>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="sweetalert2.min.js"></script>

      <script src="assets/sekrip.js"></script>
   </body>
</html>
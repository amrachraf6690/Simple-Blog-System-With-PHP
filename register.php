<?php
$msg = '';
include 'php/db.php';

if (isset($_POST['repass'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = md5($_POST['pass']);
  $repass = md5($_POST['repass']);
if ($pass == $repass){
  $query = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$pass')";
  $insert = mysqli_query($connection,$query);
  if ($insert){
    $msg = "Registered Successfully . You can <a href='sign-in.php'>Login now</a>";
  }

}else{
  $msg = "Passwords Does not match";

}

}


?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign Up</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!----------- Shortcut icon -------->
    <link rel="icon" href="Images/logo.png" type="image/x-icon">
    <!----------- normailze CSS -------->
    <link rel="stylesheet" href="CSS/normalize.css" />
    <!----------- style CSS -------->
    <link rel="stylesheet" href="CSS/style.css" />
    <!----------- Font Family -------->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
        <!-- Font Awesome Library -->
        <link rel="stylesheet" href="css/all.min.css" />
    <!------ Import Fontawesome ------->
    <!-- <script
      src="https://kit.fontawesome.com/767e3e07a2.js"
      crossorigin="anonymous"
    ></script> -->
  </head>
  <body class="register-page">
    <main>
      <div class="register">
        <form method = "POST" action="" class="register-inputs">
          <h2>Sign Up</h2>
          <div class="register-input">
            <label for="register-UN"><i class="fa-solid fa-user"></i></label>
            <input type="text" placeholder="Your Name" name="name" id="register-UN" />
          </div>
          <div class="register-input">
            <label for="register-E"><i class="fa-solid fa-envelope"></i></label>
            <input type="email" placeholder="Email" name="email" id="register-E" />
          </div>
          <div class="register-input">
            <label for="register-pw"><i class="fa-solid fa-lock"></i></i></label>
            <input type="password" placeholder="Password" name="pass" id="register-pw" />
            <span class="error"></span>
          </div>
          <div class="register-input">
            <label for="register-c-pw"><i class="fa-solid fa-lock"></i></label>
            <input
              type="password"
              placeholder="Confirm Password"
              name="repass"
              id="register-c-pw"
            />
          </div>
          <div class="register-check">
            <input type="checkbox" name="register-check" />
            <label for="register-check"
              > I agree all statements in <a href="">Terms of service</a></label
            >
            
          </div><br><?php echo $msg ?>
          <button class="register-btn" type="submit" name="signup">
            Register
          </button>
        </form>
        <div class="register-img">
          <img src="Images/signup-image.jpg" alt="" />
          <a href="sign-In.php">I am already member</a>
        </div>
      </div>
    </main>
  </body>
</html>

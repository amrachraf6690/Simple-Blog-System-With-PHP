<?php
if (isset($_POST['message'])){
  require 'php/db.php';
  $name = $_POST['firstname'].' '.$_POST['lastname'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $query = "INSERT INTO `contact`( `name`, `email`, `message`) VALUES ('$name','$email','$message')";
  $insert = mysqli_query($connection,$query);
  if ($insert){
    echo "<script>alert('Thanks for support . You will be redirected to home page.');
    window.location.replace('index.php');</script>";
// add new ticket count by 1
require 'admin/php/functions.php';
$old = readtxt("admin/txt/stickets.txt");
$new = $old + 1;
writetxt("admin/txt/stickets.txt",$new);
  }
  }

?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Contact US</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!----------- Shortcut icon -------->
    <link rel="icon" href="Images/logo.png" type="image/x-icon">
    <!-- Render All Elements Normally -->
    <link rel="stylesheet" href="css/normalize.css" />
    <!-- Contact US Css File -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap"
      rel="stylesheet"
    />
  </head>
  <body class="contact-page">
    <header>
      <div class="logo">
        <img src="images/logo.blogs.png" alt="">
      </div>
      <nav class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="object.php">Objects</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="">Contact</a></li>
        </ul>
      </nav>
    </header>

    <div class="contact-us">
      <div class="text">
        <h1>Contact Us</h1>
        <p>
          Need to get in touch with us ? Fill in these blanks and our expert
          support team will answer your all questions
        </p>
      </div>
      <div class="inputs">
        <form action="" method="POST">
          <div class="flex">
            <div class="contact-input">
              <label for="">First Name</label>
              <input type="text" required name="firstname" />
            </div>

            <div class="contact-input">
              <label for="">Last Name</label>
              <input type="text" required name="lastname" />
            </div>
          </div>

          <div class="contact-input">
            <label for="">Email</label>
            <input type="email" required name="email" />
          </div>

          <div class="contact-input">
            <label for="">What can we help you with ?</label>
            <textarea required name="message"></textarea>
          </div>

          <div class="contact-input">
            <input type="submit" />
          </div>
        </form>
      </div>
    </div>
  </body>
</html>

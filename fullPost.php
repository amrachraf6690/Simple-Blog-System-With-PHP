<?php
  include 'php/db.php';
  $id = $_GET['id'];
  $query = mysqli_query($connection, "SELECT * FROM `articles` where id='$id'");
  while ($row = mysqli_fetch_array(($query))){
      $title = $row['title'];
      $content = $row['content'];
      $object = $row['object'];
      $date = $row['date'];
      $user_id = $row['user_id'];
      $query2 = mysqli_query($connection, "SELECT * FROM `users` where id='$user_id'");
      $row2 = mysqli_fetch_array($query2);
      $user_name = $row2['name'];
  }
  
require "admin/php/functions.php";
$old = readtxt("admin/txt/visitors.txt");
$new = $old + 1;
writetxt("admin/txt/visitors.txt",$new);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Blog</title>
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
  <body class="home-page fulPost-page">
    <header>
      <div class="logo">
        <img src="images/logo.blogs.png" alt="">
      </div>
      <nav class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="object.php">Objects</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav>
    </header>
    <main class="home-main">
      <div class="fullPost-container">
      <div class="full-post"><h2 class="full-post-header"><?php echo $title ?></h2>
  <p class="post-date">
      by <span class="post-author"><?php echo $user_name ?> </span>- <?php echo $date ?>
    </p>
  <p class="full-post-text">
    <?php echo $content ?>

 </p>
  <div class="hashtags">
    <a href="object.php?object=<?php echo $object ?>"><div class="hashtag"><?php echo $object ?></div></a>
    </div>
  </div>
    </main>
  </body>
</html>


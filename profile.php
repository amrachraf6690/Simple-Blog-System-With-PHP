<?php
session_start();
if (!isset($_SESSION["id"])) {
header("Location: sign-in.php");
}else{
  $user_id = $_SESSION["id"];
  include 'php/db.php';
  
  $query = mysqli_query($connection, "SELECT * FROM `users` where id='$user_id'");
  while ($row = mysqli_fetch_array(($query))){
      $name = $row['name'];
      $email = $row['email'];
}
}
//Add New Post
if (isset($_POST['content'])){
  require 'php/db.php';
  $title = $_POST['title'];
  $content = $_POST['content'];
  $object = $_POST['object'];
  $query = "INSERT INTO `articles`(`title`, `content`,`object`,`user_id`) VALUES ('$title','$content','$object','$user_id')";
  $insert = mysqli_query($connection,$query);
  if ($insert){
    echo "<script>alert('Post addedd successfully')</script>";
    // add new ticket count by 1
require 'admin/php/functions.php';
$old = readtxt("admin/txt/posts.txt");
$new = $old + 1;
writetxt("admin/txt/posts.txt",$new);
  }
  }
?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Blog</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!----------- Shortcut icon -------->
    <link rel="icon" href="Images/logo.png" type="image/x-icon" />
    <!----------- normailze CSS -------->
    <link rel="stylesheet" href="CSS/normalize.css" />
    <!----------- style CSS -------->
    <link rel="stylesheet" href="CSS/style.css" />
    <!----------- Font Awesome Library -->
    <link rel="stylesheet" href="Css/all.min.css" />
    <!----------- Font Family -------->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body class="home-page">
    <header>
      <div class="logo">
        <img src="images/logo.blogs.png" alt="" />
      </div>
      <nav class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="object.php">Objects</a></li>
          <li><a href="">Profile</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav>
    </header>
    <div class="profile">
      <div class="user-info">
        <div class="default-pic">
          <img src="Images/default pic.png" alt="" />
        </div>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#addpost">Add Post</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="sign-out.php">Sign Out</a></li>
        </ul>
      </div>
      <div class="user-about">
        <h1>Your Information</h1>
        

          <div class="your-info">
            <label for="">Name</label>
            <input
              type="text"
              name="lastname"
              id=""
              placeholder="<?php echo $name ?>"
              value="<?php echo $name ?>"
              readonly
            />
          </div>

          <div class="your-info">
            <label for="">Email</label>
            <input
              type="email"
              name="email"
              id=""
              placeholder="<?php echo $email ?>"
              readonly
            />
          </div>
        
      </div>
    </div>

    <div class="add-post" id="addpost">
      <form action="" method="POST" class="your-article">
        <label for="post">Add Post</label>
        <input type="text" name="title" id="post-title" placeholder="Title" />
        <textarea
          name="content"
          id="post"
          placeholder="What's In Your Mind ?"></textarea>
          
          <label for="post">Object</label>
          <center><select name="object" style="width: 120px">
            <option value="Business">Business</option>
            <option value="Food">Food</option>
            <option value="Story">Story</option>
            <option value="Sports">Sports</option>
            <option value="Idea">Idea</option>
            <option value="Design">Design</option>
            <option value="Life Style">Life Style</option>
            <option value="Others">Others</option>
          </select></center>
        <input type="submit" value="Post" class="post-btn" />
      </form>
    </div>
    
  </body>
</html>
<!DOCTYPE html>
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
  <body class="home-page">
    <header>
      <div class="logo">
        <img src="images/logo.blogs.png" alt="" />
      </div>
      <nav class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="object.php">Objects</a></li>
          <li><?php
          session_start();
          if (isset($_SESSION["id"])) {
              echo '<a href="profile.php"> Profile';
          }else{
            echo '<a href="sign-in.php"> Login';
          }
          ?></a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav>
    </header>

    <!------ Main ----->
    <main class="home-main">
      <div class="main-posts">
        <?php
include 'php/db.php';

$query = mysqli_query($connection, "SELECT * FROM `articles` order by id DESC");
while ($row = mysqli_fetch_array(($query))){
    $title = $row['title'];
    $title_sh = substr($title, 0, 120);
    $content = $row['content'];
    $content_sh = substr($content, 0, 210);
    $object = $row['object'];
    $date = $row['date'];
    $user_id = $row['user_id'];
    $query2 = mysqli_query($connection, "SELECT * FROM `users` where id='$user_id'");
    $row2 = mysqli_fetch_array($query2);
    $user_name = $row2['name'];
    
echo '
<div class="post">
          <a href="fullPost.php?id='.$row['id'].'"
            ><h2 class="post-header">'.$title_sh.'.....</h2></a
          >
          <p class="post-date">
          by <span class="post-author">'.$user_name.'</span>- '.$date.'
          </p>
          <p class="post-text">
            '.$content_sh.'.....
          </p>
          <div class="hashtags">
            <a href="object.php?object='.$object.'"><div class="hashtag">'.$object.'</div></a>
          </div>
          <a href="fullPost.php?id='.$row['id'].'"><button class="continue-btn">Continue Reading</button></a>
        </div>';
}
?>
      </div>

  </body>
</html>

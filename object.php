
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
          <li><a href="profile.php">Profile</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav>
    </header>

    <!------ Main ----->
    <main class="object-main">
      <div class="hashtags">
        <a href="object.php?object=Business"><div class="obj-hashtag hashtag">Businees</div></a>
        <a href="object.php?object=Food"><div class="obj-hashtag hashtag">Food</div></a>
        <a href="object.php?object=Sports"><div class="obj-hashtag hashtag">Sports</div></a>
        <a href="object.php?object=Story"><div class="obj-hashtag hashtag">Story</div></a>
        <a href="object.php?object=Idea"><div class="obj-hashtag hashtag">Idea</div></a>
        <a href="object.php?object=Design"><div class="obj-hashtag hashtag">Design</div></a>
        <a href="object.php?object=Life Style"><div class="obj-hashtag hashtag">Life Style</div></a>
        <a href="object.php?object=Others"><div class="obj-hashtag hashtag">Others</div></a>
      </div>
      <div class="chosen-posts"></div>
      <?php
if (isset($_GET['object'])){
  $object = $_GET['object'];
  include 'php/db.php';
  
  $query = mysqli_query($connection, "SELECT * FROM `articles` where object='$object'");
  while ($row = mysqli_fetch_array(($query))){
      $title = $row['title'];
      $title_sh = substr($title, 0, 120);
      $content = $row['content'];
      $content_sh = substr($content, 0, 210);
      $object = $row['object'];
      $date = $row['date'];

           
  echo '
  <div class="post">
            <a href="fullPost.php?id='.$row['id'].'"
              ><h2 class="post-header">'.$title_sh.'......</h2></a
            >
            <p class="post-date">
              Published at <span class="post-author">'.$date.'</span>
            </p>
            <p class="post-text">
              '.$content_sh.'
            </p>
            <div class="hashtags">
              <div class="hashtag">'.$object.'</div>
            </div>
            <a href="fullPost.php?id='.$row['id'].'"><button class="continue-btn">Continue Reading</button></a>
          </div>';
  }
  }
?>
    </main>
  </body>
</html>

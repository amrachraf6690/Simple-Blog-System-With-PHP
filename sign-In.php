<?php
$msg = "";
if (isset($_POST['signin'])){
  require 'php/db.php';
  $email = $_POST['email'];
  $pass = md5($_POST['password']);
  
  $query = "select * from users where email='$email' and password='$pass'";
  $check = mysqli_query($connection,$query);
  $result = mysqli_num_rows($check);
  if ($result>0){
    session_start();
    $row = mysqli_fetch_assoc($check);
    $_SESSION["id"] = $row['id'];
    header("Location: profile.php");
  }else{
    $msg = "You inserted a wrong email or password . please try again";
  }

  }

;




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign IN</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!----------- Shortcut icon -------->
    <link rel="icon" href="Images/logo.png" type="image/x-icon">
    <!-- Render All Elements Normally -->
    <link rel="stylesheet" href="css/normalize.css" />
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- Main Css File -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container">
      <div class="box">
        <div class="image">
          <img src="images/signin-image.jpg" alt="" />
          <a href="register.php" class="create-account">Create An Account</a>
        </div>
        <div class="signin">
          <h1>Sign In</h1>
          <form action="" method="POST">
            <div class="info">
              <label for="your-name"><i class="fa-solid fa-user"></i></label>
              <input
                type="email"
                name="email"
                id="your-name"
                placeholder="Your Mail Address"
                required
              />
            </div>

            <div class="info">
              <label for="password"><i class="fa-solid fa-lock"></i></label>
              <input
                type="password"
                name="password"
                id="password"
                placeholder="Password"
                required
              />
            </div>

            <div class="info">
              <input type="checkbox" name="checkbox" id="remmber" />
              <label for="remmber">Remmber Me</label>
              
            </div>
            <?php  echo $msg?><br><br>
            <div class="info">
              
              <input
                type="submit"
                name="signin"
                id="signin"
                class="form-submit"
                value="Log in"
              />
            </div>
          </form>

          
        </div>
      </div>
    </div>
  </body>
</html>

<?php
 require "../php/db.php";
 $id = $_GET['id'];
 //Fetch Post data
 $query = mysqli_query($connection, "SELECT * FROM `articles` where id = $id");
 $row = mysqli_fetch_array($query);
 $title = $row['title'];
 $content = $row['content'];
   
if (isset($_POST['content'])){
    
    require "../php/db.php";
    $new_title = $_POST['title'];
    $new_content = $_POST['content'];
    
    $query = "UPDATE `articles` SET `title`='$new_title',`content`='$new_content' WHERE id = $id";
    $excute = mysqli_query($connection,$query);
      echo '<script>alert("Post edited successfully");
      window.location.replace("posts.php");</script>';
  
    }
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel | edit</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="files/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="files/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="files/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Post </b>Editing
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="text"  name= "title" class="form-control" placeholder="Title: <?php echo $title ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <textarea  name= "content"  class="form-control" placeholder="Content: <?php echo $content ?>"></textarea>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" name="edit" class="btn btn-primary btn-block">Edit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="files/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="files/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="files/js/adminlte.min.js"></script>
</body>
</html>

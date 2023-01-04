<?php
 require "../php/db.php";
 $id = $_GET['id'];
 //Fetch Post data
 $query = mysqli_query($connection, "SELECT * FROM `contact` where id = $id");
 $row = mysqli_fetch_array($query);
 $name = $row['name']. "( ".$row['email']." )";
 $message = $row['message'];
   
if (isset($_POST['response'])){
    $response = $_POST['response'];
    require "../php/db.php";
    $query = mysqli_query($connection, "DELETE FROM `contact` WHERE id = $id");
require "php/functions.php";
$old = readtxt("txt/stickets.txt");
$new = $old - 1;
writetxt("txt/stickets.txt",$new);


$message = "Here is your blog admin.
Thanks for your ticket and here is my response
" . $response . "<br>Please keep online with our website https://amrachraf.info";
$to = $row['email'];
$headers = "Content-type:text/plain;charset=UTF-8\r\n";
$headers .= "From: Website Admin <admin@amrachraf.info>\r\n";
$subject = "Resonse to your support ticket";
$msg = strtoupper($message);
mail($to,$subject,$msg,$headers);
echo "<script>alert('You responsed to this support ticket . You will be redirected to support tickets list');
window.location.replace('support.php');
</script>";
}
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel | Response</title>

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
          <input type="text"  name= "title" class="form-control" placeholder="From: <?php echo $name ?>" disabled>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <textarea  name= "content"  class="form-control" placeholder="Message: <?php echo $message ?>" disabled></textarea>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <center>Response</center>
        <div class="input-group mb-3">
          <textarea  name= "response"  class="form-control" placeholder="Here to type response"></textarea>
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

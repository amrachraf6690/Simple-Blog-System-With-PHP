
<?php
session_start();
if (!isset($_SESSION["admin"])) {
  echo "<script>alert('Please Login First.');
  window.location.replace('login.php');</script>";
}
require 'php/functions.php';
$visitors = readtxt("txt/visitors.txt");
$posts = readtxt("txt/posts.txt");
$stickets = readtxt("txt/stickets.txt");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel | Support Tickets</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="files/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="files/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="files/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item menu-open">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="posts.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Posts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item menu-open active">
            <a href="support.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Support Tickets
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Logout
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->  
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"><br>

  <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Support Tickets</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name (Email)</th>
                    <th>Message</th>
                    <th>Time</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php
include '../php/db.php';

$query = mysqli_query($connection, "SELECT * FROM `contact`");
while ($row = mysqli_fetch_array(($query))){
    $name = $row['name'] . " (".$row['email'].")";
    $message = $row['message'];
    $message_sh = substr($message, 0, 210);
    $date = $row['date'];
    
echo '
                    <td>'.$name.'</td>
                    <td>'.$message_sh.'
                    </td>
                    <td>'.$date.'</td>
                    <td><a href="response.php?id='.$row['id'].'"<button class="btn btn-success">Response</button></a> | <a href="delete-support.php?id='.$row['id'].'"<button class="btn btn-danger">Delete</button></a></td>
                    </tr>
                    ';}?>  
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        <!-- /.row -->
        <!-- Main row -->
        

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>

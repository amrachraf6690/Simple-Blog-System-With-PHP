<?php
$id = $_GET['id'];
require "../php/db.php";
$query = mysqli_query($connection, "DELETE FROM `contact` WHERE id = $id");
require "php/functions.php";
$old = readtxt("txt/stickets.txt");
$new = $old - 1;
writetxt("txt/stickets.txt",$new);
echo "<script>alert('Support Ticket is deleted . You will be redirected to support tickets list');
window.location.replace('support.php');
</script>";


?>
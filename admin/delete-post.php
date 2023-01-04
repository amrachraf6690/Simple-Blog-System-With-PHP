<?php
$id = $_GET['id'];
require "../php/db.php";
$query = mysqli_query($connection, "DELETE FROM `articles` WHERE id = $id");
require "php/functions.php";
$old = readtxt("txt/posts.txt");
$new = $old - 1;
writetxt("txt/posts.txt",$new);
echo "<script>alert('Post is deleted . You will be redirected to support posts list');
window.location.replace('posts.php');
</script>";


?>
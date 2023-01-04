<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'blog';

$connection = mysqli_connect($host,$user,$pass);
$select_db = mysqli_select_db($connection,$db);

if (!$select_db){
    echo "There is error while connecting to DataBase";
}
?>
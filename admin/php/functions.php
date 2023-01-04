<?php

function readtxt($name){
$myfile = fopen($name, "r") or die("Unable to open file!");
return fread($myfile,filesize($name));

}

function writetxt($name,$new){
$myfile = fopen("$name", "w") or die("Unable to open file!");
fwrite($myfile, $new);
}
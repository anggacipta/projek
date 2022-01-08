<?php
$server="localhost";
$user="root";
$pass="";
$database="laundry";

$connect=mysqli_connect($server, $user, $pass, $database);

if(!$connect){
   die("<script>alert('Connection Failed')</script>");
}

?>
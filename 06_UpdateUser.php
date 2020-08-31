<?php
session_start();
//connect.php (tells where to connect servername, username, password, dbaseName)
require_once('connect.php');
$output_message = null;

$username = $_POST['input1']; 
$password = $_POST['input2']; 

$hashpass = hash("sha256", $password);//Hashes password for extra security

$updatequery = "UPDATE user SET Password = '$hashpass' WHERE UserName = '$username'";
mysqli_query($con,$updatequery);      

  
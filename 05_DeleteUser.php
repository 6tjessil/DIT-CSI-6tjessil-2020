<?php
session_start();
//connect.php (tells where to connect servername, username, password, dbaseName)
require_once('connect.php');

$UserName = $_POST['input1']; 
if ($UserName != $_SESSION['login_user']){
//check if username being deleted is not of the currently logged in user	

$deletequery = "DELETE FROM user WHERE UserName = '$UserName'"; //Deletion query
$checkquery = "SELECT * FROM user WHERE UserName = '$UserName'"; //Checks if username exsits

$result_check = mysqli_query($con, $checkquery);//Runs check query and stores result 
$count = mysqli_num_rows($result_check);//Counts number of rows returned

if (!mysqli_query($con,$deletequery)){ //Echos message if query breaks
        $output_message = "It Broke";
        echo $output_message;
}elseif($count == 0){ //Echos error message if username doesn't exist in database.
        $output_message = "Username doesn't exsit";
        echo $output_message;}
}else{
        echo "You can't delete your own user"; }//Echos message if user tries to delete themsleves
?>
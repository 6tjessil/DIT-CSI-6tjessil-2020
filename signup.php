<?php
    require_once("connect.php");
    $output_message = null; //$error renamed - stores error message

    $username = $_POST['UserName'];
    $password = $_POST['Password'];

    $hashpass = hash("sha256", $password);

    $checkquery = "SELECT * FROM user WHERE username = '$username'"; //Checks if username exsits
    $insertquery = "INSERT INTO user(`username`, `password`) VALUES ('$username','$hashpass')"; //Inserts new user data

    $result_check = mysqli_query($con, $checkquery); //Running $insertquery
    $count = mysqli_num_rows($result_check); //Counts number of rows

    if ($count > 0){ //Checks if number of rows is greater than 0
        $output_message = "Name already taken";
        echo $output_message;

    } elseif (strlen($username) > 15){
        $output_message = "Username is too long";
        echo $output_message;
    }else{
        $result_query = mysqli_query($con,$insertquery);
        $output_message = "Registration Successful";
        echo $output_message;
    }
?>

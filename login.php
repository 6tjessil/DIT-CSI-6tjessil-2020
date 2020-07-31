<?php
//Login Page
session_start();
    $output_message = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('connect.php');
    $myusername = mysqli_real_escape_string($con, $_POST['username']);
    $mypassword = mysqli_real_escape_string($con, $_POST['password']);

    $hashpass = hash("sha256", $mypassword);

    $sql = "SELECT UserName FROM user WHERE UserName = '$myusername' and Password = '$hashpass'";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if ($count == 1){
        $_SESSION['login_user'] = $myusername;
    } else {
        $output_message = "Your login name or password is invalid";
        echo $output_message;
        //header("location: index.php");
    }
    }
?>

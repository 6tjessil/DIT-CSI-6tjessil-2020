<!--Login Page-->

<?php
session_start();
    $error = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('connect.php');
    $myusername = mysqli_real_escape_string($con, $_POST['username']);
    $mypassword = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT username FROM user WHERE username = '$myusername' and password = '$mypassword'";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;
        header("location: index.php");
    } else {
        $error = "Your login name or password is invalid";
        header("location: index.php");
    }
    }
?>


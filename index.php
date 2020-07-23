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
    }
    }
?>

<!--Homepage-->
<!DOCTYPE html>
<html lang="en">

<head>
  <title>TJessil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  require("nav.php")
  ?>
  home page
  <div id="id01" class="modal">
    <div id = "login_modal">
      <span onclick="document.getElementById('id01').style.display='none'"class="close" title="Close Modal">&times;</span>
      <h1>Login</h1>
      <form action="" method="post" id="login">
        <p>Username</p><input type="text" name="username" id="box" placeholder="Please enter a username" /><br />
        <p>Password</p><input type="password" name="password" id="box" placeholder="Please enter a password" /><br />
        <input type="submit" value="Login"/><br/>
      </form>  
    </div>
  </div>

</body>

</html>
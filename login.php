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
    }
    }
?>

<!DOCTYPE html 5>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>TJessil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  require("nav.php")
  ?>

  <div id="main">
    <h1><span class='light'>Teacher_Level 3 - FORMS - </span>LOGIN FOR USERS</h1>
  </div>
  <div id="container">
    <div id="fcontent">
      <div align="center">
        <h2>
          <form action="" method="post" id="login">
            <label id="login">Username: </label><input type="text" name="username" id="box" placeholder="Please enter a username" /><br />
            <label id="login">Password: </label><input type="password" name="password" id="box" placeholder="Please enter a passoword" /><br />
            <input type="submit" value="Submit" /><br />
          </form>
        </h2>
        <?php echo $error; ?>
      </div>
    </div>
  </div>

</body>

</html>
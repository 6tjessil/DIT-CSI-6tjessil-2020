<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Graham's Music</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>

<body> <!--Requiring php files so that features are accessible to the user-->
  <?php
  require("nav.php")
  ?>
  <?php
  require("login_form.php");
  require('signup_form.php');
  ?>
  
<div class = "contact_form"> <!--Stores contact form code-->
                <div class="contact_box">
                    <h1>Contact Us</h1>
                         <form action="mail-test.php" method="POST">
                                <input type="text" id="name" name="name" placeholder="Your full name">
                                <input type="text" id="email" name="email" placeholder="Your email">
                                <textarea id ="body" name="body" placeholder="Write something..." style="height:200px"></textarea>
                                <input type="submit" value="Submit">
</form>
  </div>
</div>

</body><!--Connects javascript files with site-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="script.js"></script>
</html>
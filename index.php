<?php session_start();?>
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
  require("nav.php");
  ?>

<div class = "hp_container">
  <div id = "hp_title">
    New Releases
  </div>
  <div id = "hp_images">
    <div class = "row">
      <div class = "column">
        <div class = "hp_image_holder">
          <div class="image_container">
            <img src="image.jpg" alt="Avatar" class="hp_image">
             <div class="overlay">
            <div class="text">Hello World</div>
          </div>
             </div>
        </div>
      </div>

      <div class = "column">
      <div class = "hp_image_holder">
          <div class="image_container">
            <img src="image.jpg" alt="Avatar" class="hp_image">
             <div class="overlay">
            <div class="text">Hello World</div>
          </div>
             </div>
        </div>
      </div>

      <div class = "column">
      <div class = "hp_image_holder">
          <div class="image_container">
            <img src="image.jpg" alt="Avatar" class="hp_image">
             <div class="overlay">
            <div class="text">Hello World</div>
          </div>
             </div>
        </div>
      </div>
    </div>
<iframe src="https://www.youtube.com/embed/o7lqCcE4Lho" width="500" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>

</div>

<?php
  require("login_form.php");
  require('signup_form.php');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script.js"></script>

</body>

</html>

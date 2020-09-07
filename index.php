<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Vibes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  require("nav.php");
  ?>

<div class = "hp_container"> <!--Code below is used to create containers to store song cover images-->
  <div id = "hp_title">
    New Releases
  </div>
  <div id = "hp_images">
    <div class = "row">
      <div class = "column">
        <div class = "hp_image_holder">
          <div class="image_container">
            <img src="images/imgdra.jpg" alt="Imagine Dragons" class="hp_image">
             <div class="overlay">
            <div class="text"> 
            Radioactive by Imagine Dragons
            </div>
            </div>
             </div>
        </div>
      </div>

      <div class = "column">
      <div class = "hp_image_holder">
          <div class="image_container">
            <img src="image.jpg" alt="Avatar" class="hp_image">
             <div class="overlay">
            <div class="text"> </div>
          </div>
             </div>
        </div>
      </div>

      <div class = "column">
      <div class = "hp_image_holder">
          <div class="image_container">
            <img src="image.jpg" alt="Avatar" class="hp_image">
             <div class="overlay">
            <div class="text"> </div>
          </div>
             </div>
        </div>
      </div>
    </div>
</div>
<!--Requiring the below files to ensure that the login and signup system works-->
<?php 
  require("login_form.php");
  require('signup_form.php');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script.js"></script>


</body>

</html>

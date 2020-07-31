<!--Contact page-->
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
  contact page
  <?php
  require("login_form.php");
  require('signup_form.php');
  ?>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="script.js"></script>

  <div id="contact_form" >
  <div class = "contact_box">
    <h1>Contact Us</h1>
    <form method = "GET">
      <p>Name</p>
      <input type = "text" name = "name" placeholder="Please your name" id="name" required>
      <p>Subject</p>
      <textarea name = "subject" placeholder="Please enter your question" id = "query" required></textarea>
      <input type = "submit" name = "submit" value= "Submit">
    </form>
  </div>
</div>

</body>

</html>
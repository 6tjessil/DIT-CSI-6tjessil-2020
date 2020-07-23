<div id="signup_form" class="modal">
  <div class = "login_box">
  <span onclick="document.getElementById('signup_form').style.display='none'" class="close" title="Close Modal">&times;</span>
    <h1>Sign Up</h1>
    <form method = "POST" action = "signup.php">
      <p>Username</p>
      <input type = "text" name = "UserName" placeholder="Please enter a username">
      <p>Password</p>
      <input type = "password" name = "Password" placeholder="Please enter a password">
      <input type = "submit" name = "submit" value= "Register">
    </form>
  </div>
</div>
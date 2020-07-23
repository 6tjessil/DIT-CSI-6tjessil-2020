<div id="signup_form" class="modal">
  <div class = "login_box">
  <span onclick="document.getElementById('signup_form').style.display='none'; document.getElementById('signupform_message').innerHTML = ''" class="close" title="Close Modal">&times;</span>
    <h1>Sign Up</h1>
    <form method = "POST" action = "signup.php">
      <p>Username</p>
      <input type = "text" name = "UserName" placeholder="Please enter a username" id="UserName" required>
      <p>Password</p>
      <input type = "password" name = "Password" placeholder="Please enter a password" id = "Password" required>
      <input type = "submit" name = "submit" value= "Register">
      <p id="signupform_message"> </p>
    </form>
  </div>
</div>
<div id="login_form" class="modal">
  <div class = "login_box">
  <span onclick="document.getElementById('login_form').style.display='none'" class="close" title="Close Modal">&times;</span>
    <h1>Login</h1>
    <form method = "POST"action = "login.php">
      <p>Username</p>
      <input type = "text" name = "username" placeholder="Please enter your username">
      <p>Password</p>
      <input type = "password" name = "password" placeholder="Please enter your password">
      <input type = "submit" name = "submit" value= "Login">
    </form>
  </div>
</div>
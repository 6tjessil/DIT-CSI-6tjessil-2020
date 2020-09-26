<?php session_start(); //Prevents a user who is not signed from viewing this page
	if(!isset($_SESSION["login_user"])){
		header ("location: index.php");
	} 
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Graham's Music</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body>
	<?php
  	require("nav.php")
  	?>

	<div class = "tab">
		<div class="tab_sidebar"> <!--Code for the tabs-->
			<button class="tab_button" data-for-tab="1">User list</button>
			<button class="tab_button" data-for-tab="2">New user</button>
			<button class="tab_button" data-for-tab="3">Update users</button>
			<button class="tab_button" data-for-tab="4">Delete users</button>
		</div>

		<div class="tab_content" data-tab="1">
			<table>
				<tr>
					<th>User ID</th>
					<th>UserName</th>
				</tr>
				<?php //Displays all user accounts in the database
				require_once("connect.php");
				$query = "SELECT * FROM user";
				$rs = mysqli_query($con, $query);
				if ($rs) {
					while ($row = mysqli_fetch_array($rs)) {
					echo "<tr><td>" . $row['user_id'] . "</td><td>" . $row['UserName'] . "</td></tr>";
					}
				}
				?>
			</table>
		</div>

		<div class="tab_content" data-tab="2"> <!--Stores code for the form that add users-->
				<div class = "input_box">
					<h1>New User</h1>
					<form method = "POST" action="04_AddUser.php" id="newuser_form">
						<p>Name</p>
						<input type = "text" name = "input1" id= "input1"placeholder="Please enter a username" required>
						<p>Password</p>
						<input type = "password" name = "input2" id="input2" placeholder="Please enter a password" required>
						<input type = "submit" name = "submit" value= "Submit">
					</form>
					<p id="newuser_box_message"></p>
				</div>
			</div>

		<div class="tab_content" data-tab="3"><!--Stores code for the form that updates users-->
				<div class = "input_box">
					<h1>Update password</h1>
					<form method = "POST" action="06_UpdateUser.php" id="updateuser_form">
						<p>Username</p>
						<input type = "text" name = "input1" id= "changeinput1" placeholder="Please enter your current username" required>
						<p>New Password</p>
						<input type = "password" name = "input2" id="changeinput2" placeholder="Please enter a new password" required>
						<input type = "submit" name = "submit" value= "Submit">
					</form>
					<p id="updateuser_box_message"></p>
			</div>
		</div>

		<div class="tab_content" data-tab="4"><!--Stores code for the form that deletes users-->
		<div class = "input_box">
					<h1>Delete usernames</h1>
					<form method = "POST" action="05_DeleteUser.php" id="deleteuser_form">
						<p>Username</p>
						<input type = "text" name = "input1" id= "deleteinput" placeholder="Please enter a username" required>
						<input type = "submit" name = "submit" value= "Submit">
					</form>
					<p id="deleteuser_box_message"></p>
			</div>
		</div>

	</div><!--This is where the javascript files are inked to the site-->
	</body>
	<script src="jquery-3.5.1.min.js"></script>
	<script src="script.js"></script> 
</html>



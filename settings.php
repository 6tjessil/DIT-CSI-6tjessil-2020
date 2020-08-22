<!-- localhost/UseThis/03_UserListTable.php-->
<?php session_start(); 
	if(!isset($_SESSION["login_user"])){
		header ("location: index.php");
	} 
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Settings</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body>
	<?php
  	require("nav.php")
  	?>

	<div class = "tab">
		<div class="tab_sidebar">
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
				<?php
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

		<div class="tab_content" data-tab="2">
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

		<div class="tab_content" data-tab="3">
				<div class = "input_box">
					<h1>Update usernames</h1>
					<form method = "POST" action="06_UpdateUser.php" id="updateuser_form">
						<p>Old Username</p>
						<input type = "text" name = "input1" id= "changeinput1" required>
						<p>New Username</p>
						<input type = "text" name = "input2" id="changeinput2"required>
						<input type = "submit" name = "submit" value= "Submit">
					</form>
					<p id="updateuser_box_message"></p>
			</div>
		</div>

		<div class="tab_content" data-tab="4">
		<div class = "input_box">
					<h1>Delete usernames</h1>
					<form method = "POST" action="06_UpdateUser.php" id="deleteuser_form">
						<p>Username</p>
						<input type = "text" name = "input1" id= "deleteinput" required>
						<input type = "submit" name = "submit" value= "Submit">
					</form>
					<p id="deleteuser_box_message"></p>
			</div>
		</div>

	</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="script.js"></script> 
</html>



<!-- localhost/UseThis/03_UserListTable.php-->
<?php session_start(); 
	if(!isset($_SESSION["login_user"])){
		header ("location: index.php");
	} 
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
			<button class="tab_button" data-for-tab="1">Tab #1</button>
			<button class="tab_button" data-for-tab="2">Tab #2</button>
			<button class="tab_button" data-for-tab="3">Tab #3</button>
			<button class="tab_button" data-for-tab="4">Tab #4</button>
		</div>

		<div class="tab_content" data-tab="1">
			<table>
				<tr>
					<th>Username</th>
					<th>Password</th>
				</tr>
				<?php
				require_once("connect.php");
				$query = "SELECT * FROM user";
				$rs = mysqli_query($con, $query);
				if ($rs) {
					while ($row = mysqli_fetch_array($rs)) {
					echo "<tr><td>" . $row['UserName'] . "</td><td>" . $row['Password'] . "</td></tr>";
					}
				}
				?>
			</table>
		</div>

		<div class="tab_content" data-tab="2">
				<div class = "input_box">
					<h1>New User</h1>
					<form method = "POST" action="04_AddUser.php" id="input_form">
						<p>Name</p>
						<input type = "text" name = "input1" id= "input1"placeholder="Please enter a username" required>
						<p>Password</p>
						<input type = "password" name = "input2" id="input2" placeholder="Please enter a password" required>
						<input type = "submit" name = "submit" value= "Submit">
					</form>
					<p id="input_box_message"></p>
				</div>
		</div>

		<div class="tab_content" data-tab="3">
			<form method="post" name="input" action="settings.php" > 
			ExistingUser Name:<br/> <input name="ExistingUserName" type="text"/><br/>
			New User Name:<br/> <input name="NewUserName" type="text"/><br/>
			<input type="submit" name="submit" value="Update" /> </form>
			<?php
				//connect.php (tells where to connect servername, username, password, dbaseName)
				require_once('connect.php');
				print "<h3>Connected to server</h3>\n";
				
				$ExistingUserID = $_POST['ExistingUserName']; 
				$NewUserID = $_POST['NewUserName']; 
				
				//create a variable to store sql code for the 'Add Users' query
				$updatequery = "UPDATE user SET username = '$NewUserID' WHERE username = '$ExistingUserID'";
				if (mysqli_query($con,$updatequery))
				{
				echo "<h3>Record updated</h3>";
				}
				else
				{
				echo "<h3>Error updatinging record:</h3> ";
				}
			?>
		</div>

		<div class="tab_content" data-tab="4">
			<form method="post"> 
			User Name:<br/> <input name="UserName" type="text"/><br/>
			<input type="submit" name="submit" value="Delete" /> </form>
			
			<?php
				//connect.php (tells where to connect servername, username, password, dbaseName)
				require_once('connect.php');
				print "<h3>Connected to server</h3>\n";
				
				$UserID = $_POST['UserName']; 
				
				//create a variable to store sql code for the 'Add Users' query					
				$deletequery = "DELETE FROM user WHERE username = '$UserID'";

				if (mysqli_query($con,$deletequery))
				{
				echo "<h3>Record deleted</h3>";
				}
				else
				{
				echo "<h3>Error deleting record:</h3> ";
				}
			?>
		</div>

	</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="script.js"></script> 
</html>



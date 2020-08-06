<!-- localhost/UseThis/03_UserListTable.php-->

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
					echo "<tr><td>" . $row['Username'] . "</td><td>" . $row['Password'] . "</td></tr>";
					}
				}
				?>
			</table>
			Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam laudantium ea a corporis repellat expedita porr
			o assumenda sint nemo accusamus? Facilis voluptates itaque quas temporibus nihil voluptas optio dolorem obcaecati!
			o assumenda sint nemo accusamus? Facilis voluptates itaque quas temporibus nihil voluptas optio dolorem obcaecati!
			o assumenda sint nemo accusamus? Facilis voluptates itaque quas temporibus nihil voluptas optio dolorem obcaecati!
			o assumenda sint nemo accusamus? Facilis voluptates itaque quas temporibus nihil voluptas optio dolorem obcaecati!
			o assumenda sint nemo accusamus? Facilis voluptates itaque quas temporibus nihil voluptas optio dolorem obcaecati!
			o assumenda sint nemo accusamus? Facilis voluptates itaque quas temporibus nihil voluptas optio dolorem obcaecati!
		</div>

		<div class="tab_content" data-tab="2">
			<form method="post" name="input" action="settings.php" > 
			User Name:<br/> <input name="UserName" type="text"/><br/> 
			Password:<br/> <input name="Password" type="text"/><br/> 
			<input type="submit" name="submit" value="insert" /> </form>
			<?php
				//connect.php (tells where to connect servername, username, password, dbaseName)
				require_once('connect.php');
				print "<h3>Connected to server</h3>\n";
				
				$UserID = $_POST['UserName']; 
				$PW = $_POST['Password'];
				
				//create a variable to store sql code for the 'Add Users' query
				$insertquery = "INSERT INTO user( username, password ) VALUES(  '$UserID', '$PW' )";
				
				if (mysqli_query($con,$insertquery))
				{
				echo "<h3>Record inserted</h3>";
				}
				else
				{
				echo "<h3>Error inserting record:</h3> ";
				}
			?>
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
			<form method="post" name="input" action="settings.php" > 
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
	<script src="script.js"></script> 
</html>



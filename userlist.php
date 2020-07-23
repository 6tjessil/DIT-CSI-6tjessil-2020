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
					echo "<tr><td>" . $row['username'] . "</td><td>" . $row['password'] . "</td></tr>";
					}
				}
				?>
			</table>

<!-- localhost/UseThis/03_UserListTable.php-->

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserListTable</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="script.js"></script>
</head>
	<body>
	<?php
	require("innav.php")
	?>
		<div class="tab">
		<button class="tablinks" onclick="openOption(event, 'view')">Users</button>
		<button class="tablinks" onclick="openOption(event, 'create')">Create</button>
		<button class="tablinks" onclick="openOption(event, 'update')">Update</button>
		<button class="tablinks" onclick="openOption(event, 'delete')">Delete</button>
		</div>
		<div id="view" class="tabcontent">
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
					echo "<tr><td>" . $row['username'] . "</td><td>" . $row['password'] . "</td></tr>";
					}
				}
				?>
			</table>
		</div>

		<div id="create" class="tabcontent">
			<form action = "settings.php" method = "POST">
			<table>
				<tr>
				<td>Name: </td>
				<td><input type="text" name="Username" required></td>
				</tr>
				<tr>
				<td>Password: </td>
				<td><input type="password" name= "Password" required></td>
				</tr>
				<td><input type="submit" name= "submit" required></td>
			</table>
			</form>
			<?php 
				$username = $_POST['Username'];
				$password = $_POST['Password'];

				if(!empty($username) || !empty($password)){
					$host = 'localhost';
					$dbUsername = 'root';
					$dbPassword = 'dojustly01';
					$dbName = 'staff';

					$conn = new mysqli($host,$dbUsername,$dbPassword, $dbName);

					if(mysqli_connect_error()){
						die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
					}else{
						$SELECT  = "SELECT username FROM user WHERE username = ? Limit 1";
						$INSERT = "INSERT INTO user(username,password) VALUES(?,?)";
						
						$stmt = $conn->prepare($SELECT);
						$stmt->bind_param("s",$username);
						$stmt->execute();
						$stmt->bind_result($username);
						$stmt->store_result();
						$rnum = $stmt->num_rows();

						if ($rnum == 0) {
							$stmt->close();

							$stmt = $conn->prepare($INSERT);
							$stmt->bind_param("ss", $username, $password);
							$stmt->execute();
							echo "New record inserted successfully";
						} else {
							echo "Someone already registered using this username";
						}
						$stmt->close();
						$conn->close();
					}
				} else{ 
					echo "All field are required";
					die();
				}
			?>
		</div>

		<div id="update" class="tabcontent">
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
					$updatequery = "UPDATE users SET UserID = '$NewUserID' WHERE UserID = '$ExistingUserID'";
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

		<div id="delete" class="tabcontent">
			Delete
		</div>

	</body>
</html>

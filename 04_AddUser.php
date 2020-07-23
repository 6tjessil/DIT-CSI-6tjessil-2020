				
			<?php
				require_once("connect.php");
				print "<h3>Connected to server</h3>";
				var_dump($_POST);

				$UserID = $_POST['username']; 
				$PW = $_POST['password'];
				
				$insertquery = "INSERT INTO user(`username`, `password`) VALUES ($UserID,$PW)";
				
				if (mysqli_query($con,$insertquery))
				{
				echo "<h3>Record inserted</h3>";
				}
				else
				{
				echo "<h3>Error inserting record:</h3> ";
				}
			?>




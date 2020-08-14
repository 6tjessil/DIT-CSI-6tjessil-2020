<?php
session_start();
					//connect.php (tells where to connect servername, username, password, dbaseName)
					require_once('connect.php');
					
					$UserName = $_POST['input1']; 
					if ($UserName != $_SESSION['login_user']){
					//create a variable to store sql code for the 'Add Users' query					
					$deletequery = "DELETE FROM user WHERE UserName = '$UserName'";
					
					if (!mysqli_query($con,$deletequery))
					{
						$output_message = "It Broke";
						echo $output_message;
					}
				}else{
					echo "You can't delete your own user";
				}
				?>
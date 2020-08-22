<?php
session_start();
					//connect.php (tells where to connect servername, username, password, dbaseName)
					require_once('connect.php');
					
					$UserName = $_POST['input1']; 
					if ($UserName != $_SESSION['login_user']){
					//create a variable to store sql code for the 'Add Users' query					
					$deletequery = "DELETE FROM user WHERE UserName = '$UserName'";
					$checkquery = "SELECT * FROM user WHERE UserName = '$UserName'"; //Checks if username exsits
					$result_check = mysqli_query($con, $checkquery); 
					$count = mysqli_num_rows($result_check);
					if (!mysqli_query($con,$deletequery))
					{
						$output_message = "It Broke";
						echo $output_message;
					}elseif($count == 0){
						$output_message = "Username doesn't exsit";
						echo $output_message;
					}
				}else{
					echo "You can't delete your own user";
				}
				?>
<?php
session_start();
				//connect.php (tells where to connect servername, username, password, dbaseName)
				require_once('connect.php');
				$output_message = null;
				$ExistingUserID = $_POST['input1']; 
				$NewUserID = $_POST['input2']; 
				if($ExistingUserID != $_SESSION['login_user']){
				//create a variable to store sql code for the 'Add Users' query
				$updatequery = "UPDATE user SET UserName = '$NewUserID' WHERE UserName = '$ExistingUserID'";
				if (!mysqli_query($con,$updatequery))
				{
					$output_message = "It Broke";
					echo $output_message;
				}}else{
					echo "You can't update your username while your logged in!";
				}
			?>
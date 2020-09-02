<?php //Used to connect to the database
	//$con = mysqli_connect('localhost','root','dojustly01','3083550_6tjessil');
	$con = mysqli_connect('localhost','root','dojustly01','3083550_6tjessil');
        if (mysqli_connect_errno())
        {
        echo "Failed to connect". mysqli_connect_error();
        }
?> 
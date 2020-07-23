<?php
//servername:localhost
//username: TJessil
//password: dojustly01
//databasename: 'staff'

	$con = mysqli_connect('localhost','Tomin','dojustly01','staff');
        if (mysqli_connect_errno())
        {
        echo "Failed to connect". mysqli_connect_error();
        }
?> 
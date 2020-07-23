				
<?php
    require_once("connect.php");
    
    $username = $_POST['UserName']; 
    $password = $_POST['Password'];
    
    $insertquery = "INSERT INTO useraccount(`username`, `password`) VALUES ('{$username}','{$password}');";
    
    if (mysqli_query($con,$insertquery))
    {
    header('nav.php');
    header("location: index.php");
    echo "<h3>Record inserted</h3>";
    }
    else
    {
    echo "<h3>Error inserting record:</h3> ";
    }
?>




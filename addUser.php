
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

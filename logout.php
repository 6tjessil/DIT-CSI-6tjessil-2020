<!--Logout Page-->
<?php
session_start();
if(isset($_SESSION['login_user'])){
    session_destroy();
    echo"<script>location.href= 'index.php'</script>";
    }
else{
    echo"<script>location.href= 'index.php'</script>";
}
?>

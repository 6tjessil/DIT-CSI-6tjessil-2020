   <?php 
        require_once("connect.php")
        ?> <!--Enables user to send a message to the awardspace email-->
        
<?php
$name = $_POST['name'];
$text = $_POST['body'];
$email = $_POST['emailaddress'];

$awardspaceEmail = "admin@tomin.dx.am";
$recipientEmail = "admin@tomin.dx.am";
        
$from = "From: Mail Contact Form<".$awardspaceEmail.">";
$to = $recipientEmail;
        
$subject = "Form submission from: $name";
$body = "Message: $text \n Email Address: $email";
        
if(mail($to,$subject,$body,$from)){
         echo"E-mail message sent!";
}else{
         echo "E-mail delivery failure!";              
}
?>
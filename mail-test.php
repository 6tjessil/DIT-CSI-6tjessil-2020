<?php

require('conntact.php');

$name = $_POST['name'];
$text = $_POST['body'];
$email = $_POST['email'];
$output_message = null;

$awardspaceEmail = "admin@tomin.dx.am";
$recipientEmail = "admin@tomin.dx.am";
        
$from = "From: Mail Contact Form<".$awardspaceEmail.">";
$to = $recipientEmail;
        
$subject = "Form submission from: $name";
$body = "Message: $text \n Email Address: $email \n Phone Number: $number";
        
if(mail($to,$subject,$body,$from)){
  $output_message = "Successful";
  echo $output_message;
}else{
  $output_message = "Fail";
  echo $output_message;              
}
?>
  </body>
</html>
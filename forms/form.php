<?php

# ----------------------------------------------------
# -----
# ----- This script was generated by PHP-Form Wizard 1.2.5 on 1/2/2009 at 04:24:38 �
# -----
# ----- http://www.tools4php.com
# -----
# ----------------------------------------------------


// Receiving variables
@$pfw_ip= $_SERVER['REMOTE_ADDR'];
@$Name = addslashes($_POST['Name']);
@$email = addslashes($_POST['email']);
@$zip = addslashes($_POST['zip']);
@$FeedBack = addslashes($_POST['FeedBack']);




require_once("check.php");
//Sending Email to form owner
$pfw_header = "From: $email\n"
  . "Reply-To: $email\n";
$pfw_subject = "testing demo";
$pfw_email_to = "mydemo@tools4php.com";
$pfw_message = "Visitor's IP: $pfw_ip\n"
. "\n";
@mail($pfw_email_to, $pfw_subject ,$pfw_message ,$pfw_header ) ;

 echo("<p align='center'><font face='Arial' size='3' color='#0000FF'>Security code matches, thanks for spending this time testing our demo form</font></p>");
?>

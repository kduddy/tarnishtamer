<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require_once("config.php");
if(isset($_GET['pfw_security_code']))
{
$code = $_GET['pfw_security_code'];
}
else
{
$code = $_POST['pfw_security_code'];
}
if(!$CaseSenstive)
{
	$code = strtolower($code);
}
if(md5($code)==$_SESSION['pfw_text']) $comp = 1;

if($comp!=1)
{
   switch($error_display_mode)
   {
   	case 0:		
    die("<p align=\"center\"><font face=\"Arial\" size=\"3\" color=\"#FF0000\">$error<br /><br />Please Go Back to <a href=\"javascript: history.back();\">Previous Page</a></font></p>");
    break;

    case 1:
    header("location: $error_page");
    break;

    case 2:
	
    $translation = implode('',@file($form));
    $translation = str_replace("<!-- error alert goes here -->","<p align='center'><font face='Arial' size='3' color='#FF0000'>$error</font></p>",$translation);		
    header("Cache-control: public");
    die($translation);
     break;

   }

}
if($redirect)
{
	header("location: $success_page");
}











?>
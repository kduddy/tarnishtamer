<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require_once("captchalib.php");
header("Content-type: image/png");

$str = Get_Text();
$im = create_image();
draw_string($str,$im);
imagepng($im);
if($CaseSenstive==true)
{
$_SESSION['pfw_text']=md5($str);
}
else
{
$str = strtolower($str);
$_SESSION['pfw_text']=md5($str);
}
?>
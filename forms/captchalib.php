<?php
require_once("config.php");
error_reporting(E_ALL ^ E_NOTICE);
function Get_Text()
{
global $text_length;
	$letters =  array("a","A","b","B","c","C","d","D","e","E","f","F","g","G",
"h","H","i","I","j","J","k",
"K","l","L","m","M","n","N","o","O","p","P","q","Q","r",
"R","s","S","t","T","u","U","v",
"V","w","W","x","X","y","Y","z","Z","1","2","3","4","5",
"6","7","8","9");
mt_srand((double)microtime()*1000000);
 $txt = "";
 shuffle($letters);
   for($i=0;$i<$text_length;$i++)
   {
      $key = rand(0,count($letters)-1);
      $txt .= $letters[$key];	
    }
return $txt;
}

function create_image()
{
    global $width,$hight,$text_length,$border;
    $im = imagecreate($width,$hight);
    $bgc = imagecolorallocate($im, rand(235,255), rand(235,255),rand(235,255));
    $tc  = imagecolorallocate($im, 0, 0, 0);
    imagefill($im,0,0,$tc);
    imagefilledrectangle($im,$border,$border,$width-$border,$hight-$border,$bgc);
    return $im;

}

function draw_string($txt,$im)
{
   global $hight,$width,$font_size,$text_length,$font_file;
   $space1 = $width/($text_length+1);   //space between characters
   $space2 = ($width - $space1)/3  ;   //space between lines
   $center = $hight/2;


   for($f=0;$f<3;$f++)
   {
   	$y1 =  $center/2;
  	$y2 =  1.5*$center;
  	$x1 = ($space1/2) + ($f * $space2);
  	$x2 = ($space1/2) + (($f +1) * $space2);
  	// echo "$x1,$x2 + $y1,$y2 <br>";
     for($k=0;$k<2;$k++)
	  {
           $lc =  imagecolorallocate($im,rand(0,200), rand(0,200), rand(0,200));
           imageline($im,rand($x1,$x2),rand($y1,$y2),rand($x1,$x2),rand($y1,$y2),$lc);
      }
    }

	for($i=0;$i<$text_length;$i++)
	{
	 $txtc =  imagecolorallocate($im,rand(0,160), rand(0,160), rand(0,160));
	 $x = ($space1-($font_size/2))+($i*$space1); //x  coordinate of each character
	 imagettftext($im,$font_size,rand(-40,40),$x,rand($center,$center+10),$txtc,$font_file,$txt[$i]);
	}

}


?>
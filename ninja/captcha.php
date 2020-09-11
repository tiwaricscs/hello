<?php
 $image = @imagecreatetruecolor(140, 40) or die("Cannot Initialize new GD image stream");
 //setting background 
 $background = imagecolorallocate($image,0xFF,0xFF,0xFF);
 imagefill($image,0,0,$background);
 $linecolor = imagecolorallocate($image,0xCC,0xBB,0xCC);
 $textcolor  = imagecolorallocate($image,0x33,0x55,0x77);

 //draw line on canvas
 for($i=0;$i<6;$i++){
    imagesetthickness($image,rand(1,3));
    imageline($image,0,rand(0,30),120,rand(0,30),$linecolor);
 }
 session_start();
 $digit ='';
 for($x=15;$x<=100;$x+=10){
     $digit .=($num = rand(0,5));
     imagechar($image,rand(3,5),$x,rand(2,14),$num,$textcolor);

 }
 $_SESSION['captcha'] = $digit;
 header('Content-type:image/png');
 imagepng($image);
 imagedestroy($image);
?>

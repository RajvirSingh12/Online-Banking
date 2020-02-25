<?php
session_start();

$font = 'LaBelleAurore.ttf' ;
header('Content-Type: image/png');
$im = imagecreatetruecolor(200, 200);
$black = imagecolorallocate($im, 0, 0, 0);
$greyish = imagecolorallocate($im, 215, 215, 215);
$orange = imagecolorallocate($im, 255, 79, 0);
$blue = imagecolorallocate($im, 56, 77, 184);

imagefilledrectangle($im, 8, 8, 190, 190, $greyish);

$length = 6;
$text1 = substr(str_shuffle(md5(time())),0,$length);
imagettftext($im, 20, 20, 15, 75, $orange, $font, $text1);

$length = 6;
$text2 = substr(str_shuffle(md5(time())),0,$length);
imagettftext($im, 40, -30, 25, 110, $blue, $font, $text2);

$text = $text1.$text2;
$_SESSION["captcha"] = $text;

imagepng($im);
imagedestroy($im);

?>
<?php

$ourImage = imagecreatefrompng('images/tshirt.png');

$fontColor = imagecolorallocate($ourImage, 255, 255, 255);

$fontFile = "C:\Windows\Fonts\arial.ttf";

$fontSize= 24;

$posX = 5;

$posY = 24;

$angle = 0;

imagettftext($ourImage, $fontSize, $angle, $posX, $posY, $fontColor, $fontFile, $txt);

header("Content-type: tshirt/png");

imagepng($ourImage);

imagedestroy($ourImage);

?>

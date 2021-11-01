<?php

$ourImage = imagecreatefromjpeg('images/tshirt.png');

$fontColor = imagecolorallocate($ourImage, 0, 0, 0);

$fontFile = "fonts/arial.ttf";

$fontSize= 24;

$posX = 150;

$posY = 200;

$angle = 0;

$txt="Hello World";

imagettftext($ourImage, $fontSize, $angle, $posX, $posY, $fontColor, $fontFile, $txt);

header("Content-type: image/png");

imagepng($ourImage);

imagedestroy($ourImage);

?>

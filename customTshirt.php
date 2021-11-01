<?php
require 'vendor/autoload.php';
$bg = 'images/tshirt.png';
$image = new PHPImage();
$image->setDimensionsFromImage($bg);
$image->draw($bg);
$image->setFont('fonts/arialbd.ttf');
$image->setTextColor(array(0, 0, 0));
$image->setStrokeWidth(1);
$image->setStrokeColor(array(255, 255, 255));
$image->text('First row', array('fontSize' => 20, 'x' => 150, 'y' => 170));
$image->text('Second row', array('fontSize' => 20, 'x' => 150, 'y' => 200));
$image->text('Third row', array('fontSize' => 20, 'x' => 150, 'y' => 230));
$image->show();
<?php
include "functions.php";
$files = $_FILES;

copy($files['image']['tmp_name'],'/var/www/html/national02/alin/national02/images/'.$files['image']['name']);

$articleId = new Article();
$articleId->fromArray($_POST);
if (getAuthUser()){
    $articleId->userId = getAuthUser()->getId();
}
$articleId->save();


$image = new Image();
$image->file = $files['image']['name'];
$image->articleId = $articleId->getId();
$image->save();


header('Location: index.php');
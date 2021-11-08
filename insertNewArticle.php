<?php
include "functions.php";

$users = User::findAll();
$categories = Category::findAll();

$template = $twig->load('insertNewArticle.html.twig');
echo $template->render(['categories'=>$categories, 'users'=>$users]);
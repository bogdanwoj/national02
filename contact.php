<?php
    include "parts/header.php";
$user = getAuthUser();
$categories = Category::findAll();

$template = $twig->load('contact.html.twig');
echo $template->render(['user'=>$user, 'categories'=>$categories]);
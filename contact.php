<?php
    include "parts/header.php";
$user = getAuthUser();

$template = $twig->load('contact.html.twig');
echo $template->render(['user'=>$user]);
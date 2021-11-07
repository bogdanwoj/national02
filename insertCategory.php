<?php include "parts/header.php";
$user = getAuthUser();

$template = $twig->load('insertCategory.html.twig');
echo $template->render(['user'=>$user]);
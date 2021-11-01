<?php
include "functions.php";


$id = $_GET['id'];
$article = new Article($id);
$categories = Category::findAll();
$user = getAuthUser();

$template = $twig->load('article.html.twig');
echo $template->render(['article'=>$article, 'categories'=>$categories, 'user'=>$user]);

?>

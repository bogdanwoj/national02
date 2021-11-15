<?php
include "parts/header.php";
use Classes\Category;
$id = intval($_GET['id']);
$category = new Category($id);
$articles =$category->getArticles();
$article = $articles[0];
$categories = Category::findAll();
$user = getAuthUser();

$template = $twig->load('category.html.twig');
echo $template->render(['articles'=>$articles, 'article'=>$article, 'category'=>$category, 'categories'=>$categories, 'user'=>$user]);
?>
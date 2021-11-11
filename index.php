<?php
include "functions.php";

$newArticleIds = query('SELECT id FROM articles ORDER BY id DESC LIMIT 2;');
$articles=[];
foreach ($newArticleIds as $newArticleId){
    $articles[] = new Article($newArticleId['id']);
}
$article = $articles[0];
$categories = Category::findAll();
$user = getAuthUser();

$template = $twig->load('index.html.twig');
echo $template->render(['articles'=>$articles, 'article'=>$article, 'categories'=>$categories, 'user'=>$user]);


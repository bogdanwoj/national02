<?php
include "functions.php";

$id = $_GET['id'];
$article = new Article($id);
$categories = Category::findAll();
$user = getAuthUser();

$newCommentsIds = query('SELECT id FROM comments WHERE articleId = '.$id.'  ORDER BY id DESC LIMIT 10;');
$comments=[];
foreach ($newCommentsIds as $newCommentsId){
    $comments[] = new Comment($newCommentsId['id']);
}


$template = $twig->load('article.html.twig');
echo $template->render(['article'=>$article, 'categories'=>$categories, 'user'=>$user, 'comments'=>$comments]);



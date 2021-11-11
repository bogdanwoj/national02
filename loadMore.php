<?php
include "functions.php";
$limit=2;
$page= $_GET['page'];
$offset =  $page* $limit;
$newArticleIds = query("SELECT id FROM articles ORDER BY id DESC LIMIT $offset,$limit;");
$articles=[];
foreach ($newArticleIds as $newArticleId){
    $articles[] = new Article($newArticleId['id']);
}

$template = $twig->load('loadMore.html.twig');
echo $template->render(['articles'=>$articles]);


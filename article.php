<?php
include "functions.php";

$id = $_GET['id'];
$article =  $entityManager->getRepository(\Entities\Articles::class)->find($id);
$categories = $entityManager->getRepository(\Entities\Categories::class)->findAll();
$user = getAuthUser();

$comments = $entityManager->getRepository(\Entities\Comments::class)->findBy(['articleId'=>$id],['id'=>'DESC'], 10);


$template = $twig->load('article.html.twig');
echo $template->render(['article'=>$article, 'categories'=>$categories, 'user'=>$user, 'comments'=>$comments]);



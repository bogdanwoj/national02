<?php
include "functions.php";

$comment = new \Entities\Comments();

$comment->setComment($_POST['comment']);
$comment->setArticleId($_POST['articleId']);


if (getAuthUser()){
    $comment->setUser(getAuthUser());
}

$entityManager->persist($comment);
$entityManager->flush();

header("Location: article.php?id={$_POST['articleId']}");
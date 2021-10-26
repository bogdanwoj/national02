<?php
include "functions.php";

$comment = new Comment();
$comment->fromArray($_POST);
if (getAuthUser()){
    $comment->userId = getAuthUser()->getId();
}

$comment->save();
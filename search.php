<?php
include "parts/header.php";

    $query = "SELECT * FROM articles";

    $filters = "";
    if (isset($_GET['search'])){
        $search = $_GET['search'];
        $filters=" WHERE name LIKE '%$search%' OR title LIKE '%$search%'";
    }
    if(isset($filters)){
        $query.=$filters;
    }
    $searchedArticles = query($query);
    $articles = [];
    foreach ($searchedArticles as $searchedArticle){
        $articles[] = new Article($searchedArticle['id']);
    }

    $template = $twig->load('search.html.twig');
    echo $template->render(['articles'=>$articles]);



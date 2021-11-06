<?php
    include "functions.php";

    $user = getAuthUser();

    $template = $twig->load('adminPage.html.twig');
    echo $template->render(['user'=>$user]);

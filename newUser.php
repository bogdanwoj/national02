<?php
    include "functions.php";

    $user = getAuthUser();

    $template = $twig->load('newUser.html.twig');
    echo $template->render(['user'=>$user]);
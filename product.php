<?php
include "parts/header.php";

$user = getAuthUser();
$newProductIds = query('SELECT id FROM products ORDER BY id DESC LIMIT 4;');
$products = [];
foreach ($newProductIds as $newProductId) {
    $product = new Product($newProductId['id']);

}
$template = $twig->load('product.html.twig');
echo $template->render(['product'=>$product, 'user'=>$user]);

<?php
include "parts/header.php"
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Cumpara tricou personalizat</h2>
        </div>
        <div class="col-12">
            <?php
            $newProductIds = query('SELECT id FROM products ORDER BY id DESC LIMIT 4;');
            foreach ($newProductIds as $newProductId){
                $product = new Product($newProductId['id']);
                $product->productCard();
            }
            ?>
        </div>
    </div>
</div>
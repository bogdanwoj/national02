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
                $product = new Product();
                $product->card();
            ?>
        </div>
    </div>
</div>
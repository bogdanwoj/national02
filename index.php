<?php
include "parts/header.php";
?>
<div class="container">.'
        <div class="row">
            <div class="col-12 mt-5 mb-2">
                 <h2>Cele mai noi stiri</h2>
            </div>
        </div>

<?php
    $newArticleIds = query('SELECT id FROM articles ORDER BY id DESC LIMIT 10;');
    foreach ($newArticleIds as $newArticleId){
        $article = new Article($newArticleId['id']);
        $article->card();
}
?>.'
	   
    </div>

<?php
    include "parts/footer.php"
?>


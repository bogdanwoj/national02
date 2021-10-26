
<?php
    include "parts/header.php";
    $id = $_GET['id'];
    $article = new Article($id);
?>;
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Shop/style.css">
    <title>Blogu' National02</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2 text-right">
                                <div>
                                    <h4>
                                        <?php
                                        $date = $article->date;
                                        $timestamp = strtotime ($date);
                                        $newDate = date('d', $timestamp);
                                        echo $newDate;
                                        ?>
                                        <br/>
                                        <?php
                                        $newDate = date('F Y', $timestamp);
                                        echo $newDate;
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="col-10">
                                <?php
                                    $article->card();
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <?php if (getAuthUser()): ?>
                            <form method="post" action="processInsertComment.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="text">Adauga comentariu:</label>
                                    <textarea  name="comment" class="form-control" id="<?php echo $id; ?>" placeholder="Adauga comentariu"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Comenteaza</button>
                            </form>
                        <?php endif; ?>
                    </div>

                    <div class="row">
                        <div class="col-12 mt-5 mb-2">
                            <h4>Cele mai noi comentarii</h4>
                        </div>
                        <?php
                            $newCommentsIds = query('SELECT id FROM comments ORDER BY id DESC LIMIT 10;');
                            foreach ($newCommentsIds as $newCommentsId){
                                $comment = new Comment($newCommentsId['id']);
                                $comment->cardComment();
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-5 mb-2">
                        <h3>Stiri similare</h3>
                    </div>
                        <?php
                        foreach ( array_slice($article->getCategory()->getArticles(),0,4) as $similarArticle){
                            if ($similarArticle->getId() != $article->getId()){
                                $similarArticle->cardSample();
                            }
                        }
                            ?>
                </div>
            </div>
            <div class="col-3">
                <h2>Categorii</h2>
                <ul class="list-group">
                    <?php $categories = Category::findAll(); ?>
                    <?php foreach ($categories as $categoryObj): ?>
                       <li class="list-group-item">
                           <a class="btn btn-primary" href="category.php?id=<?php echo $categoryObj->getId(); ?>">
                               <?php echo $categoryObj->name ?>
                               <span class="badge badge-light"><?php echo count($categoryObj->getArticles());?></span>
                           </a>
                       </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php
        include "parts/footer.php";
    ?>
</body>

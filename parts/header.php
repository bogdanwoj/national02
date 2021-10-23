<?php
	include "functions.php";
?>

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
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="../blog/index.php">
                        <img src="images/Black H Logo.png" alt="" width="80" height="24">
                    </a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../blog/index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <?php if (getAuthUser() && getAuthAdmin()): ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="adminPage.php">Admin page</a>
                            </li>
                            <?php endif;?>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Categorii
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php $categories = Category::findAll(); ?>
                                    <?php foreach ($categories as $categoryObj): ?>
                                        <a class="dropdown-item" href="category.php?id=<?php echo $categoryObj->getId(); ?>"><?php echo $categoryObj->name ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                                <?php if (getAuthUser()): ?>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                Salut, <b><?php echo getAuthUser()->getUsername(); ?></b>
                                            </div>

                                            <div class="col-6">
                                                <a href="processLogout.php">Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <a href="login.php">Login</a>
                                    <a href="newUser.php">
                                        <span>Cont nou</span>
                                    </a>
                                <?php endif; ?>
                            </li>
                            <?php if (getAuthUser() && getAuthAdmin()): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="../Shop/adminPanel.php">Admin Panel</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <form class="d-flex" method="get" action="search.php">
                            <input class="form-control me-2" type="search" placeholder="Cauta" aria-label="search" name="search">
                            <button class="btn btn-outline-success" type="submit">Cauta</button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</body>
</html>

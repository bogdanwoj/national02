<!DOCTYPE html>
<?php include "functions.php"; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>eMAG.ro - Libertate in fiecare zi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php if (!getAuthUser() || !getAuthAdmin()){
    header('Location: index.php');
}
?>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-6">
            <div class="row text-center">
                <div class="col-5"><h2>Admin panel</h2></div>
                <div class="col-7 logo">
                    <a href="index.php">
                        <img src="images/insertImage.png" alt="logo" title="blog" height="100px;">
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-4 mr-2">
            <div class="col-2 ">
                <a href="newUser.php" class="btn btn-primary mt-4">
                    Creaza un cont nou
                </a>
            </div>
        </div>
        <div class="row mt-4 mr-2">
            <div class="col-2 ">
                <a href="insertCategory.php" class="btn btn-primary mt-4">
                    Adauga categorie articole
                </a>
            </div>
        </div>
        <div class="row mt-5 mr-2">
            <div class="col-2 ">
                <a class="btn btn-primary" href="insertNewArticle.php">
                    Adauga articol nou
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    function showLastUsersBtn() {
        var seeLastUsers = document.getElementById("lastUsers");
        if (seeLastUsers.style.display === "none") {
            seeLastUsers.style.display = "block";
        } else {
            seeLastUsers.style.display = "none";
        }
    }
</script>
</body>
</html>
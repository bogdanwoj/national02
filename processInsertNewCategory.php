<?php
include "functions.php";

$categoryId = new Category();
$categoryId->fromArray($_POST);
$categoryId->save();

header('Location: index.php');
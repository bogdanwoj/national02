<?php
include "functions.php";

if (count(User::findBy('username', $_POST['username'])) > 0 || count(User::findBy('email', $_POST["email"])) > 0){
    header('Location: newUser.php');
} else {
    $newUser = new User();
    $newUser->username = $_POST['username'];
    $newUser->password = md5($_POST['password']);
    $newUser->email = $_POST['email'];
    $newUser->role = $_POST['role'];
    $newUser->save();

    header('Location: adminPage.php');
}
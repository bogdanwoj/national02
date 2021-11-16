<?php
session_start();

include "classes/Base.php";
include "classes/Article.php";
include "classes/Category.php";
include "classes/Image.php";
include "classes/User.php";
include "classes/Comment.php";
include "classes/Subscriber.php";
include "classes/Product.php";
include "classes/ProductImage.php";


include "dbConnection.php";

require 'vendor/autoload.php';

$debug = true;

/* Twig bootstrap */
$loader = new \Twig\Loader\FilesystemLoader('views');
$twig = new \Twig\Environment($loader, [
    'cache' => 'cache/twig_cache',
    'debug' => $debug,
]);

/* Doctrine bootstrap */

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(__DIR__."/entities");
$isDevMode = $debug;


$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null,null, false);

$conn = \Doctrine\DBAL\DriverManager::getConnection($dbParams);


// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

function query($sql)
{
    global $mysql;
    $query = mysqli_query($mysql,$sql);
    if ($query===true){
        return true;
    }
    if ($query===false){
        die('Error on:'.$sql);
    }

    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}



function getAuthUser(){
    global $entityManager;
    if (isset($_SESSION['userId'])){
        $user =  $entityManager->getRepository(\Entities\Users::class)->find($_SESSION['userId']);
        return $user;
    } else {
        return false;
    }
}



function formatPrice($price){
    $intPart = intval($price);

    $floatPart = intval(($price-$intPart)*100);

    return "$intPart<sup>$floatPart</sup>";
}

function getCurrentCart(){
    if (isset($_SESSION['cartId'])){
        return new Cart($_SESSION['cartId']);
    } else {
        $cart = new Cart();
        $cart->userId=0;
        $cart->save();
        $_SESSION['cartId'] = $cart->getId();
        return $cart;
    }
}

$salt = 'dsakjashdkjkjisdf3244@#$@#$dssdf';

<?php
require_once "vendor/autoload.php";


use Doctrine\ORM\Tools\Console\ConsoleRunner;

include "dbConnection.php";
/* Doctrine bootstrap */

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(__DIR__."/entities");
$isDevMode = true;


$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode,null,null, false);

$conn = \Doctrine\DBAL\DriverManager::getConnection($dbParams);


// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);


return ConsoleRunner::createHelperSet($entityManager);
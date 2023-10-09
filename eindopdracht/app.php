<?php

//Current working directory
$dir = __DIR__;

//Autoload vendor classes
require_once "$dir/vendor/autoload.php";

//Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable($dir);
$dotenv->load();

//INCLUDES
include_once "$dir/includes/db.php";

//FUNCTIONS
include_once "$dir/functions/global.php";
include_once "$dir/functions/articles.php";
include_once "$dir/functions/categories.php";

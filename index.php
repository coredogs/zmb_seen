<?php

//Compute the file path to the root of this Web application.
//This will be available to all classes.
$app_file_root = realpath(dirname(__FILE__));

//Start the router.
require_once($app_file_root . '/controllers/router.php');


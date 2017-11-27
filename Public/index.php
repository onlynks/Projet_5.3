<?php
session_start();

//define the main file
define( "APP_PATH", dirname( dirname( __FILE__ ) ) );


//charge composer's classes
require(APP_PATH . '/vendor/autoload.php');

// Load and use the Autoloader
include ('../Framework/Autoloader.php');
Framework\Autoloader::Register();

//hydrate routes from the configuration file
Framework\Router::hydrate(App\Config\Routes::$routes);

//check if the current URL match with one of our routes, if it does, dispatch to the right controller
Framework\Router::matchAndDispatch();




/*
echo '<pre>';
var_dump();
echo '</pre>';
*/







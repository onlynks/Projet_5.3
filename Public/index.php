<?php
//define the main file
define( "APP_PATH", dirname( dirname( __FILE__ ) ) );

// Load and use the Autoloader
include ('../Framework/Autoloader.php');
Framework\Autoloader::Register();

//hydrate routes from the configuration file
Framework\Route::hydrate(App\Config\Routes::$routes);

//check if the current URL match with one of our routes, if it does, dispatch to the right controller
Framework\Route::matchAndDisptch($_SERVER[REQUEST_URI]);









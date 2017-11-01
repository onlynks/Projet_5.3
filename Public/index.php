<?php
//define the main file
define( "APP_PATH", dirname( dirname( __FILE__ ) ) );

//charge composer's classes
require(APP_PATH . '/vendor/autoload.php');

//charge Twig
$loader = new Twig_Loader_Filesystem(APP_PATH . '/App/View');
$twig = new Twig_Environment($loader, array(
    'cache' => false,
));

// Load and use the Autoloader
include ('../Framework/Autoloader.php');
Framework\Autoloader::Register();

//hydrate routes from the configuration file
Framework\Router::hydrate(App\Config\Routes::$routes);

//check if the current URL match with one of our routes, if it does, dispatch to the right controller
Framework\Router::matchAndDispatch($_SERVER[REQUEST_URI]);













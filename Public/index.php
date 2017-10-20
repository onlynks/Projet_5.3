<?php

define( "APP_PATH", dirname( dirname( __FILE__ ) ) );

// Load and use the Autoloader

include ('../Framework/Autoloader.php');
Framework\Autoloader::Register();

Framework\Router::drive();





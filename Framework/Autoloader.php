<?php

namespace Framework;

class Autoloader
{
    
  public static function Autoload($class)
  {
    $path = str_replace( "\\", DIRECTORY_SEPARATOR, $class );
    
    $file = APP_PATH . DIRECTORY_SEPARATOR . $path . '.php';
	  include( $file );
  }
  
  static function Register()
  {
      spl_autoload_register(array(__CLASS__,'Autoload'));
  }
  
}
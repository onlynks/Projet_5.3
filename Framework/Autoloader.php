<?php

namespace Framework;

class Autoloader
{
    
  static function Autoload($class)
  {
      require 'Framework/' . $class . 'php';
  }
  
  static function Register()
  {
      spl_autoload_register(array(__CLASS__,'Autoload'));
  }
  
}
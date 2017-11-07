<?php

namespace Framework;

abstract class Controller{
   
    public static $action;
    public static $params;
    
    public function hydrate($action, $params)
    {
        self::$action = $action;
        self::$params = $params;
    }
    
}
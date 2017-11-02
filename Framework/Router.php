<?php

namespace Framework;

class Router
{
    public static $routes = [];
    
    
    public static function hydrate( $routesAdded = [])
    {
        self::$routes = $routesAdded;
    }
    
    public static function matchAndDispatch()
    {
       //Swap to associative array and define params
       $CurrentRouteShortcut = array('action' => $_GET['action'], 'entity' => $_GET['entity']);
       $params = array('post'=> $_POST, 'id'=> $shortcut[2]);
       
       if(in_array($CurrentRouteShortcut,self::$routes))
       {
          $controllerClass = 'App\Controller\\' . ucfirst($_GET['entity']) . 'Controller';
          return new $controllerClass($_GET['action'],$params);
          
       }
       else
       {
           echo 'La route n\'existe pas';
       }
     
    }
}


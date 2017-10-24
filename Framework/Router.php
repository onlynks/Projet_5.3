<?php

namespace Framework;

class Router
{
    public static $routes = [];
    
    
    public static function hydrate( $routesAdded = [])
    {
        self::$routes = $routesAdded;
    }
    
    public static function matchAndDispatch( $currentRoute )
    {
        
       //Array creation from URL
       $data = explode('/',$currentRoute);
       $shortcut = array_slice($data,3,3);
       
       
       //Swap to associative array and define params
       $CurrentRouteShortcut = array('entity' => $shortcut[0], 'action' => $shortcut[1]);
       $params = $shortcut[2];
       
       if(in_array($CurrentRouteShortcut,self::$routes))
       {
          $controllerClass = 'App\Controller\\' . ucfirst($CurrentRouteShortcut['entity']) . 'Controller';
          return new $controllerClass($CurrentRouteShortcut['action'],$params);
       }
       else
       {
           echo 'La route n\'existe pas';
       }
       
    }
}


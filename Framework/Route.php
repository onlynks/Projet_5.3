<?php

namespace Framework;

class Route
{
    public static $routes = [];
    
    
    public static function hydrate( $routesAdded = [])
    {
        self::$routes = $routesAdded;
    }
    
    public static function matchAndDisptch( $currentRoute )
    {
        
       //Array creation from URL
       $data = explode('/',$currentRoute);
       $shortcut = array_slice($data,3,4);
       
       //Swap to associative array
       $CurrentRouteShortcut = array('entity' => $shortcut[0], 'action' => $shortcut[1]);
       
       if(in_array($CurrentRouteShortcut,self::$routes))
       {
          $controllerClass = 'App\Controller\\' . ucfirst($CurrentRouteShortcut['entity']) . 'Controller';
          $controllerClass::defineAction($CurrentRouteShortcut['action']);
       }
       else
       {
           echo 'La route n\'existe pas';
       }
       
    }
}


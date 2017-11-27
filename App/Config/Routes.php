<?php
namespace App\Config;

class Routes
{
    public static $routes = array(
     //0
        array(
            'entity'=>'post',
            'action'=>'add',
             ),
     //1       
       array(
            'entity'=>'post',
            'action'=>'delete',
             ),
     //2
       array(
            'entity'=>'post',
            'action'=>'getList',
             ),
     //3
       array(
            'entity'=>'post',
            'action'=>'read',
             ),
     //4
       array(
            'entity'=>'post',
            'action'=>'update',
             ),
     //5
       array(
            'entity'=>'com',
            'action'=>'add',
             ),
     //6
       array(
            'entity'=>'com',
            'action'=>'getList',
             ),
     //7
       array(
            'entity'=>'com',
            'action'=>'delete',
             ),
     //8
       array(
            'entity'=>'homePage',
            'action'=>'',
             ),
             
        
     );
     
     public static $dependence = array(3 => 6, 1 => 7);
     
     public static function checkDependence($entity, $action)
     {
      $view = 
      array('entity' => $entity,
            'action' => $action
            );
      //looking for our route among all of them
      for($i = 0; $i <= 10; $i++) 
         {
           if($view == self::$routes[$i])
           {
            //try represente the key of the affected route
            $try = array_search(self::$routes[$i], self::$routes);
            
            //link and return the dependence
            $result = self::$routes[self::$dependence[$try]];
            
            return $result;
           }
         }
     }
}
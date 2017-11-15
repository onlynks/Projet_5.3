<?php

namespace Framework;

class View
{
    public static function getPage($page)
    {
        $mainFile = APP_PATH . '/App/View/' . $page.'.html.twig';
        
        $head = 'head.html.twig';
        $menu = 'menu.html.twig';
        $corp = $page.'.html.twig';
        $footer = 'footer.html.twig';
        
        if(file_exists($mainFile))
        {
           return  $builtPage = [$head, $menu, $corp, $footer];
        }
    }
    
    //put wished element of the page separated by ,
    public static function getCustomPage($view)
    {
     $elements = explode($view);
     
     foreach($elements as $element)
     {
         include ('/App/View/'.$element.'.html');
     }
    }
    
    public static function erreur()
    {
        header("HTTP/1.0 404 Not Found");
    }
}
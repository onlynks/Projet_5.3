<?php

namespace Framework;

class View
{
    public static function getPage($page)
    {
        $head = APP_PATH.'/App/View/head.html';
        $menu = APP_PATH.'/App/View//menu.html';
        $corp = APP_PATH.'/App/View/'.$page.'.html';
        $footer = APP_PATH.'/App/View/footer.html';
        if(file_exists($corp))
        {
            return $builtPage = [$head, $menu, $corp, $footer];
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
}
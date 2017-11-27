<?php

namespace App\Controller;

use Framework\Controller;

class HomePageController extends Controller
{
    public function __construct($action = null, $params = null)
    {
        parent::hydrate($action, $params);
        
        $this->getView('homepage');
        $answer = $this->sendMail();
        
        $loader = new \Twig_Loader_Filesystem(APP_PATH . '/App/View');
        $twig = new \Twig_Environment($loader, array('cache' => false, 'debug' => true,));
        $twig->addGlobal('get', $_GET);
        
        $page = $this->getView('homepage');
        
        if(isset($page))
        {
            foreach( $page as $element )
            {
               echo $template = $twig->render($element, array('post' => $post,'message' => $answer, 'coms' => $coms, 'token' =>  $_SESSION['token']));
            }
        }
        else
        {
            \Framework\View::erreur();
        }
        
    }
    
    public function sendMail()
    {
        $mailContent = parent::$params['post'];
        
        if($this->validData() == true)
        {
            $message = \Framework\MailSender::send($mailContent);
            return $message;
        }
        elseif($_SERVER['REQUEST_METHOD'] === 'POST' && $this->validData() != true)
        {
           return $message = 'Vous devez remplir tout les champs';
        }
        
    }
    
    public function validData()
    {
        $postData = parent::$params['post'];
        
        if(!empty($_POST['name'] && $_POST['mail'] && $_POST['message']) AND !null == ($_POST['name'] && $_POST['mail'] && $_POST['message']))
        {
            return true;
        }
        
    }
    
    public function getView($action)
    {
        return $page = \Framework\View::getPage($action);
    }
    
}
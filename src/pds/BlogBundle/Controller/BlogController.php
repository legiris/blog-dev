<?php

namespace pds\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    /**
    public function indexAction($name)
    {
        return $this->render('pdsBlogBundle:Default:index.html.twig', array('name' => $name));
    }*/
    
    public function indexAction()
    {
        return $this->render('pdsBlogBundle:Blog:index.html.twig');
    }
    
    
}
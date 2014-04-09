<?php

namespace pds\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
        return $this->render('pdsBlogBundle:Blog:index.html.twig', [
            'articles' => $this->getDoctrine()
                ->getRepository('pdsBlogBundle:Article')
                ->findBy(
                    [ ],
                    [ 'id' => 'DESC' ]
                ),
            ])
        ;
    }
}
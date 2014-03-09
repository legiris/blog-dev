<?php

namespace pds\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function articleAction($id)
    {
        return $this->render('pdsBlogBundle:Article:article.html.twig', [
            'article' => $this->getDoctrine()
                ->getRepository('pdsBlogBundle:Article')
                ->findOneBy([ 'id' => $id ])
        ]);
    }
}
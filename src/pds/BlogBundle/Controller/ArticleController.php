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
    
    public function latestArticleAction($count)
    {
        $articles = $this->getDoctrine()
            ->getManager()
            ->createQuery('
                SELECT a FROM pdsBlogBundle:Article a ORDER BY a.date DESC
            ')
            ->setMaxResults($count)
            ->getResult()
        ;
        
        return $this->render('pdsBlogBundle:Article:latest.html.twig', [
           'news' => $articles 
        ]);
    }
}
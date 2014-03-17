<?php

namespace pds\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommentController extends Controller
{
    public function fetchAllByArticleIdAction($articleId)
    {
        $comments = $this->getDoctrine()
            ->getManager()
            ->createQuery('
                SELECT c FROM pdsBlogBundle:Comment c
                WHERE c.articleId = :articleId
                ORDER BY c.date DESC
            ')
            ->setParameter('articleId', $articleId)
            ->getResult()
        ;
        
        return $this->render('pdsBlogBundle:Comment:comment.html.twig', [
            'comments' => $comments
        ]);
    }
}
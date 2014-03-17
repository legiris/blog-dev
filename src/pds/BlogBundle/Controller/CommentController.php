<?php

namespace pds\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use pds\BlogBundle\Entity\Comment;

class CommentController extends Controller
{
    public function addFormAction()
    {
        $comment = new Comment(); //toto ma vazbu primo na entitu, zohledni to treba max char
        
        $form = $this->createFormBuilder($comment)
            ->add('nickname')
            ->add('text', 'textarea', [
                'attr' => [ 'cols' => '45', 'rows' => '5' ]
            ])
            ->add('Vložit', 'submit')
            ->getForm()->createView()
        ;
        
        return $this->render('pdsBlogBundle:Comment:addForm.html.twig', [
            'form' => $form
        ]);
    }
    
    
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
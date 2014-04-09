<?php

namespace pds\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use pds\BlogBundle\Entity\Comment;

class CommentController extends Controller
{
    public function addAction($articleId, Request $request)
    {
        //$articleId = $request->get('articleId');
        
        $comment = new Comment();
        $comment->setArticleId($articleId);
        $comment->setId(1);
        
        $form = $this->createFormBuilder($comment)
            ->setAction($this->generateUrl('pds_blog_comment_add', [ 'articleId' => $comment->getArticleId() ] ))
            ->setMethod('POST')
            ->add('login')
            ->add('text', 'textarea', [
                'attr' => [ 'cols' => 30, 'rows' => 5 ]
            ])
            ->add('Vložit', 'submit')
            ->getForm()
        ;
        
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            try {
                $em = $this->getDoctrine()->getManager();
                $em->persist($comment);
                $em->flush();
                $this->get('session')->getFlashBag()->add('success', 'Komentář byl uložen.');
            } catch (\Doctrine\DBAL\DBALException $e) {
                $this->get('session')->getFlashBag()->add('error', 'Komentář se nepodařilo uložit.');
            }

            return $this->redirect($this->generateUrl('pds_blog_article', [ 'id' => $articleId ] ));
        }
        
        return $this->render('pdsBlogBundle:Comment:add.html.twig', [
            'comment' => $comment,
            'form' => $form->createView()
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
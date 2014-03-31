<?php

namespace pds\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use pds\BlogBundle\Entity\Comment;
//use pds\BlogBundle\Entity\User;

class CommentController extends Controller
{
    public function addAction($articleId, Request $request)
    {
        //$articleId = $request->get('articleId');
        
        $comment = new Comment();
        $comment->setArticleId($articleId);
        
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
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();
            
            return $this->redirect($this->generateUrl('pds_blog_article', [ 'id' => $articleId ] ));
        }
        
        return $this->render('pdsBlogBundle:Comment:add.html.twig', [
            'comment' => $comment,
            'form' => $form->createView()
        ]);
    }
    
//    public function adduAction(Request $request)
//    {
//        $user = new User();
//        
//        $form = $this->createFormBuilder($user)
//            ->setAction($this->generateUrl('pds_blog_comment_add'))
//            ->setMethod('POST')
//            ->add('login')
//            ->add('add', 'submit')
//            ->getForm()
//        ;
//
//        $form->handleRequest($request);
//
//        if ($form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($user);
//            $em->flush();
//            
//            // TODO redirect pds_blog_article - get ID
//            return $this->redirect($this->generateUrl('pds_blog_homepage'));
//            //return new \Symfony\Component\HttpFoundation\Response('Success');
//        }
//        
//        return $this->render('pdsBlogBundle:Comment:add.html.twig', [
//            'form' => $form->createView(),
//        ]);
//    }

    
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
<?php

namespace pds\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use pds\BlogBundle\Entity\Comment;
//use pds\BlogBundle\Entity\User;

class CommentController extends Controller
{
    
    protected $articleId;
    
    public function getArticleId()
    {
        return $this->articleId;
    }
    
    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;
    }
    
    

    public function addAction(Request $request)
    {
        $this->articleId = $request->get('articleId');        
        
        $this->setArticleId($request->get('articleId'));
        
        var_dump($this->articleId);
        var_dump($this->getArticleId());
        
        $comment = new Comment();
        
        $form = $this->createFormBuilder($comment)
            ->setAction($this->generateUrl('pds_blog_comment_add'))
            ->setMethod('POST')
            ->add('login')
            ->add('text', 'textarea', [
                'attr' => [ 'cols' => 30, 'rows' => 5 ]
            ])
            ->add('Vložit', 'submit')
            ->getForm()
        ;
        
        $form->handleRequest($request);
        
        var_dump($this->articleId);
        
        if ($form->isValid()) {
            
            //var_dump($request); exit();
            //var_dump($this->articleId); 
            var_dump($this->getArticleId()); exit;
            
            $comment->setArticleId($this->articleId);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();
            
            return $this->redirect($this->generateUrl('pds_blog_homepage'));
        }
        
        return $this->render('pdsBlogBundle:Comment:add.html.twig', [
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
<?php

namespace pds\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use pds\BlogBundle\Entity\Comment;
use pds\BlogBundle\Entity\User;

class CommentController extends Controller
{
//    public function addFormAction()
//    {
//        $comment = new Comment();
//        
//        $form = $this->createFormBuilder($comment)
//            ->add('login')
//            ->add('text', 'textarea', [
//                'attr' => [ 'cols' => 30, 'rows' => 5 ]
//            ])
//            ->add('Vložit', 'submit')
//            ->getForm()
//        ;
//        
//        return $this->render('pdsBlogBundle:Comment:addForm.html.twig', [
//            'form' => $form->createView()
//        ]);
//    }
    
    public function addFormAction(Request $request)
    {
        $user = new User();
        
        $form = $this->createFormBuilder($user)
            ->add('login')
            ->add('Vložit', 'submit')
            ->getForm()
        ;

        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            return $this->redirect('pds_blog_homepage');
        }
        
        return $this->render('pdsBlogBundle:Comment:addForm.html.twig', [
            'form' => $form->createView(),
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
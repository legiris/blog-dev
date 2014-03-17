<?php

namespace pds\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use pds\BlogBundle\Entity\Comment;

class CommentController extends Controller
{
    public function addFormAction(Request $request)
    {
        $comment = new Comment();
        
        $form = $this->createFormBuilder($comment)
            //->setMethod('POST')
            ->add('nickname', 'text')
            ->add('text', 'textarea', [
                'attr' => [ 'cols' => '45', 'rows' => '5' ]
            ])
            ->add('Vložit', 'submit')
            ->getForm()
        ;
        
        $form->handleRequest($request);
        
        
        if ($form->isSubmitted()) {
            $comment->setNickname($form->get('nickname')->getData());
            $comment->setText($form->get('text')->getData());
            $comment->setArticleId(8);
            
//            $comment->setArticleId(8);
//            $comment->setNickname('legiris');
//            $comment->setText('orbis pictus');
          
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();
            
            //return $this->redirect($this->generateUrl('pds_blog_article'));
        }
        
        return $this->render('pdsBlogBundle:Comment:addForm.html.twig', [
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
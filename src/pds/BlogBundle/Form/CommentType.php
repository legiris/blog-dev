<?php

namespace pds\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$articleId = $options['data']->getArticleId();
        
        $builder
            ->add('login')
            ->add('text', 'textarea', [
                'attr' => [ 'cols' => 30, 'rows' => 5 ]
            ])
            ->add('Vložit', 'submit');
    }
    
    public function getName()
    {
        return 'comment';
    }
}
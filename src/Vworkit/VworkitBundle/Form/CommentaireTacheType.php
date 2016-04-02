<?php

namespace Vworkit\VworkitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentaireTacheType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('texteCommentaireTache')
            ->add('tache')
            //->add('user')
            //->add('dateAjoutCommentaireTache')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vworkit\VworkitBundle\Entity\CommentaireTache'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vworkit_vworkitbundle_commentairetache';
    }
}

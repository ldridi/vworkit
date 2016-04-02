<?php

namespace Utilisateur\UtilisateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class formReseauType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('facebookUser', 'text', array('label' => 'budget','pattern' => 'https?://.+','required'  => false,'attr' => array('class' => 'form-control input-sm')))
            ->add('twitterUser', 'text', array('label' => 'budget','pattern' => 'https?://.+','required'  => false,'attr' => array('class' => 'form-control input-sm'))) 
            ->add('youtubeUser', 'text', array('label' => 'budget','pattern' => 'https?://.+','required'  => false,'attr' => array('class' => 'form-control input-sm')))
            ->add('googleplusUser', 'text', array('label' => 'budget','pattern' => 'https?://.+','required'  => false,'attr' => array('class' => 'form-control input-sm')))
            ->add('siteUser', 'text', array('label' => 'budget','pattern' => 'https?://.+','required'  => false,'attr' => array('class' => 'form-control input-sm')))
            ->add('githubUser', 'text', array('label' => 'budget','pattern' => 'https?://.+','required'  => false,'attr' => array('class' => 'form-control input-sm')))
            ->add('linkedinUser', 'text', array('label' => 'budget','pattern' => 'https?://.+','required'  => false,'attr' => array('class' => 'form-control input-sm'))) 
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Utilisateur\UtilisateurBundle\Entity\Utilisateur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'utilisateur_utilisateurbundle_utilisateur';
    }
}

<?php

namespace Utilisateur\UtilisateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UtilisateurType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomUser', 'text', array('label' => 'budget','pattern' => '[a-zA-Z]*','required'  => false,'attr' => array('class' => 'form-control input-sm')))
            ->add('prenomUser', 'text', array('label' => 'budget','pattern' => '[a-zA-Z]*','required'  => false,'attr' => array('class' => 'form-control input-sm')))
            ->add('adresseUser', 'text', array('label' => 'budget','pattern' => '[a-zA-Z0-9 ]*','required'  => false,'attr' => array('class' => 'form-control input-sm')))
            ->add('codeUser', 'text', array('label' => 'budget','pattern' => '[0-9]*','required'  => false,'attr' => array('class' => 'form-control input-sm')))
            ->add('villeUser', 'text', array('label' => 'budget','pattern' => '[a-zA-Z]*','required'  => false,'attr' => array('class' => 'form-control input-sm')))
            ->add('etatUser', 'country', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm')))
            ->add('societeUser', 'text', array('label' => 'budget','pattern' => '[a-zA-Z]*','required'  => false,'attr' => array('class' => 'form-control input-sm')))    
            ->add('telUser', 'text', array('label' => 'budget','pattern' => '[0-9]*','required'  => false,'attr' => array('class' => 'form-control input-sm')))
            ->add('telsecUser', 'text', array('label' => 'budget','pattern' => '[0-9]*','required'  => false,'attr' => array('class' => 'form-control input-sm')))
            
          
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

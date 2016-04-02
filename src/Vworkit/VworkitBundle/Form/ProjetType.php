<?php

namespace Vworkit\VworkitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjetType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreProjet', 'text', array('label' => 'budget','required'  => true,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre','title'=>'Veuillez renseigner le titre de projet')))
            ->add('descriptionProjet', 'textarea', array('label' => 'budget','required'  => true,'attr' => array('class' => 'form-control custom perso','placeholder'=>'Description','title'=>'Veuillez renseigner la description de projet')))
            ->add('objectifProjet', 'textarea', array('label' => 'budget','required'  => true,'attr' => array('class' => 'form-control ','placeholder'=>'Objectif','title'=>'Veuillez renseigner l\'objectif de projet')))
            ->add('etat','entity',array('class'=>'Vworkit\VworkitBundle\Entity\Etat','attr' => array('class' => 'form-control input-sm','title'=>'Veuillez renseigner l\'etat intial de projet')))
            ->add('budget','entity',array('class'=>'Vworkit\VworkitBundle\Entity\Budget','attr' => array('class' => 'form-control input-sm','title'=>'Veuillez renseigner le budget de projet')))
            ->add('devise','entity',array('class'=>'Utilisateur\UtilisateurBundle\Entity\Devise','attr' => array('class' => 'form-control input-sm','title'=>'Veuillez renseigner quelle devise associé au projet')))
            ->add('categorie','entity',array('class'=>'Vworkit\VworkitBundle\Entity\Categories','attr' => array('class' => 'form-control input-sm','title'=>'Veuillez renseigner la catégorie de projet')))
            ->add('competence','entity',array('class'=>'Vworkit\VworkitBundle\Entity\Competence','multiple'=>true,'attr' => array('class' => 'form-control input-sm','title'=>'Veuillez renseigner les compétences associés à votre projet')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vworkit\VworkitBundle\Entity\Projet'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vworkit_vworkitbundle_projet';
    }
}

<?php

namespace Utilisateur\UtilisateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Utilisateur\UtilisateurBundle\Form\MediaType;
class formProfilType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreUser', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control','title'=>'Modifier votre titre')))
            ->add('descriptionUser', 'textarea', array('label' => 'budget','pattern' => '[a-zA-Z]*','required'  => false,'attr' => array('class' => 'form-control','title'=>'Decrivez-vous pour améliorer votre chance')))
            ->add('competence','entity',array('class'=>'Vworkit\VworkitBundle\Entity\Competence','multiple'=>true,'required'  => false,'attr' => array('class' => 'form-control input-sm','title'=>'Choisissez vos Compétences')))
            ->add('image', new MediaType())
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

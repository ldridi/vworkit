<?php

namespace Utilisateur\UtilisateurBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class formSupprType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('raison', 'textarea', array('label' => 'raison','attr' => array('class' => 'form-control')))
                ->add('sauvegarde', 'button', array('label' => 'Oublier tous !','attr' => array('class' => 'btn btn-warning btn-sm')))
                ->add('fermer', 'submit', array('label' => 'Fermer mon compte','attr' => array('class' => 'btn btn-danger btn-sm pull-right')));
        
    }

    public function getName() {
        return 'Utilisateur_UtilisateurBundle_form';
    }

}
 

<?php

namespace Utilisateur\UtilisateurBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class formCompteType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('adresseUser', 'text', array('label' => 'Adresse','attr' => array('class' => 'form-control input-sm')))
           
            ->add('sauvegarde', 'submit', array('label' => 'Sauvegarder les changements','attr' => array('class' => 'btn btn-warning btn-sm')));
    }
    
    
    public function getName() {
        return 'Utilisateur_UtilisateurBundle_Utilisateur';
    }

}
 

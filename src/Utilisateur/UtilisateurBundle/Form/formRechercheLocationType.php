<?php

namespace Utilisateur\UtilisateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class formRechercheLocationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('location', 'country', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','option'=>'gg')));
                
    }           

    public function getName() {
        return 'utilisateur_UtilisateurBundle_location';
    }

}

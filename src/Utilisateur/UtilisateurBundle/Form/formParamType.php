<?php

namespace Utilisateur\UtilisateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class formParamType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                // form parametre du compte
                ->add('pass', 'password', array('label' => 'pass', 'attr' => array('class' => 'form-control input-sm')))
                ->add('plainPassword', 'repeated', array(
                    'type' => 'password',
                    'options' => array('translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control input-sm')),
                    'first_options' => array('label' => 'form.password'),
                    'second_options' => array('label' => 'form.password_confirmation'),
                ))
                ->add('sauvegarde', 'submit', array('label' => 'Sauvegarder les changements', 'attr' => array('class' => 'btn btn-primary btn-sm')));
                
    }

    public function getName() {
        return 'Utilisateur_UtilisateurBundle_form';
    }

}

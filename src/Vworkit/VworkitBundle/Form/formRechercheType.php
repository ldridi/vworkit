<?php

namespace Vworkit\VworkitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class formRechercheType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('recherche', 'text', array('label' => 'recherche', 'attr' => array('class' => 'form-control input-sm','placeholder'=>'Rechercher des projets')));
    }

    public function getName() {
        return 'Vwokrit_VworkitBundle_recherche';
    }

}

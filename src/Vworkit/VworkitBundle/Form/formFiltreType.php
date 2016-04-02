<?php

namespace Vworkit\VworkitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class formFiltreType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('recherche', 'text', array('label' => 'recherche', 'attr' => array('class' => 'form-control input-sm')))
                ->add('page', 'choice', array('label' => 'page', 'attr' => array('class' => 'selecter_1 form-control input-sm'),
                    'choices'=>array('1'=>'1',
                                     '2'=>'2'
                        )))
                ->add('categorie', 'choice', array('label' => 'categorie', 'attr' => array('class' => 'selecter_1 form-control input-sm'),
                    'choices'=>array('1'=>'1',
                                     '2'=>'2'
                        )))
                ->add('trier', 'choice', array('label' => 'trier', 'attr' => array('class' => 'selecter_1 form-control input-sm'),
                    'choices'=>array('1'=>'1',
                                     '2'=>'2'
                        )))
                ->add('prix', 'choice', array('label' => 'prix', 'attr' => array('class' => 'selecter_1 form-control input-sm'),
                    'choices'=>array('1'=>'1',
                                     '2'=>'2'
                        )))
                ->add('rechercher', 'submit', array('label' => 'Rechercher', 'attr' => array('class' => 'btn btn-sm btn-warning')));
    }

    public function getName() {
        return 'Vworkit_VworkitBundle_form';
    }

}

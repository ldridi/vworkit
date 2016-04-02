<?php

namespace Utilisateur\UtilisateurBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class formExamenType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categorie', 'choice', array('label' => 'categorie', 'attr' => array('class' => 'selecter_1 form-control input-sm'),
                    'choices'=>array('1'=>'1',
                                     '2'=>'2'
                                     
                        )))
             ->add('cle', 'text', array('label' => 'cle', 'attr' => array('class' => 'form-control input-sm','placeholder'=>'Entrer un mot clé')));
            
    }

    public function getName() {
        return 'Utilisateur_UtilisateurBundle_form';
    }

}
 

<?php

namespace Utilisateur\UtilisateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmploiType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEmploi', 'text', array('label' => 'cle', 'attr' => array('class' => 'form-control input-sm','placeholder'=>'Entrer un mot clé')))
            ->add('dureeEmploi', 'text', array('label' => 'cle', 'attr' => array('class' => 'form-control input-sm','placeholder'=>'Ex : 2014-2015')))
            ->add('societeEmploi', 'text', array('label' => 'cle', 'attr' => array('class' => 'form-control input-sm','placeholder'=>'Entrer un mot clé')))
            ->add('descriptionEmploi', 'textarea', array('label' => 'cle', 'attr' => array('class' => 'form-control input-sm','placeholder'=>'Entrer un mot clé')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Utilisateur\UtilisateurBundle\Entity\Emploi'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'utilisateur_utilisateurbundle_emploi';
    }
}

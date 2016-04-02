<?php

namespace Utilisateur\UtilisateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EducationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreEducation', 'text', array('label' => 'cle', 'attr' => array('class' => 'form-control input-sm','placeholder'=>'Entrer un mot clé')))
            ->add('institutEducation', 'text', array('label' => 'cle', 'attr' => array('class' => 'form-control input-sm','placeholder'=>'Entrer un mot clé')))
            ->add('descriptionEducation', 'textarea', array('label' => 'cle', 'attr' => array('class' => 'form-control input-sm','placeholder'=>'Entrer un mot clé')))
            ->add('dateFinEducation', 'text', array('label' => 'cle', 'attr' => array('class' => 'form-control input-sm','placeholder'=>'Entrer un mot clé')))   
            //->add('degree','entity',array('class'=>'Utilisateur\UtilisateurBundle\Entity\Degree','attr' => array('class' => 'form-control input-sm')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Utilisateur\UtilisateurBundle\Entity\Education'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'utilisateur_utilisateurbundle_education';
    }
}

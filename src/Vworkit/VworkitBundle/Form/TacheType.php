<?php

namespace Vworkit\VworkitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TacheType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomTache', 'text', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('descriptionTache', 'textarea', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('progression','entity',array('class'=>'Vworkit\VworkitBundle\Entity\Progression','attr' => array('class' => 'form-control input-sm')))
            ->add('label','entity',array('class'=>'Vworkit\VworkitBundle\Entity\Labeltache','attr' => array('class' => 'form-control input-sm')))
            ->add('finAjoutTache', 'date', array('label' => 'budget','required'  => false,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
            ->add('reunion','entity',array('class'=>'Vworkit\VworkitBundle\Entity\Reunion','attr' => array('class' => 'form-control input-sm')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vworkit\VworkitBundle\Entity\Tache'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vworkit_vworkitbundle_tache';
    }
}

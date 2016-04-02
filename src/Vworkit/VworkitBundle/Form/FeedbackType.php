<?php

namespace Vworkit\VworkitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BudgetType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('texteFeedback', 'textarea', array('label' => 'budget','required'  => true,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Titre')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vworkit\VworkitBundle\Entity\Budget'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vworkit_vworkitbundle_budget';
    }
}

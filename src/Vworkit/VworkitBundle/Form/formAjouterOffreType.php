<?php

namespace Vworkit\VworkitBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class formAjouterOffreType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('descriptionOffre','textarea',array('attr' => array('class' => 'form-control')))
                ->add('budgetOffre','text',array('attr' => array('class' => 'form-control input-sm')))
                ->add('dureeOffre','text',array('attr' => array('class' => 'form-control input-sm')))
                
                ;
                
                
    }
    /**
     * 
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Vworkit\VworkitBundle\Entity\Offre'
        ));
    }
    
    /**
     * 
     * @return string
     */
    public function getName() {
        return 'Vwokrit_VworkitBundle_offre';
    }

}

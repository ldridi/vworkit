<?php

namespace Vworkit\VworkitBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class formDeposerType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categorie','entity',array('class'=>'Vworkit\VworkitBundle\Entity\Categories','attr' => array('class' => 'form-control input-sm')))
            ->add('budget','entity',array('class'=>'Vworkit\VworkitBundle\Entity\Budget','attr' => array('class' => 'form-control input-sm')))
            ->add('titreProjet','text',array('attr' => array('class' => 'validate','placeholder'=>'Titre du projet')))
            ->add('descriptionProjet','textarea',array('attr' => array('class' => 'form-control')))
            ->add('competence','entity',array('class'=>'Vworkit\VworkitBundle\Entity\Competence','attr' => array('class' => 'form-control input-sm')))
            ->add('ajouter','submit',array('label'=>'Publier le projet','attr' => array('class' => 'btn btn-sm btn-warning')));
            
          
            
    }

    /**
     * 
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Vworkit\VworkitBundle\Entity\Projet'
        ));
    }
    
    /**
     * 
     * @return string
     */
    public function getName() {
        return 'Vwokrit_VworkitBundle_Projet';
    }

}
 

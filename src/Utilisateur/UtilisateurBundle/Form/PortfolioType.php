<?php

namespace Utilisateur\UtilisateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Utilisateur\UtilisateurBundle\Form\MediaType;

class PortfolioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('titrePortfolio', 'text', array('label' => 'cle','required'  => true, 'attr' => array('class' => 'form-control input-sm','placeholder'=>'Entrer un mot clé','title'=>'Veuillez renseigner le titre de projet')))
            ->add('image', new MediaType())
            
            ->add('descriptionPortfolio', 'textarea', array('label' => 'cle', 'required'  => true,'attr' => array('class' => 'form-control input-sm','placeholder'=>'Entrer un mot clé','title'=>'Veuillez renseigner le titre de projet')))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Utilisateur\UtilisateurBundle\Entity\Portfolio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'utilisateur_utilisateurbundle_portfolio';
    }
}

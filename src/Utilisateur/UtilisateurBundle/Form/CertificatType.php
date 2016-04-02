<?php

namespace Utilisateur\UtilisateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CertificatType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomCertificat', 'text', array('label' => 'cle', 'attr' => array('class' => 'form-control input-sm','placeholder'=>'Entrer un mot clé')))
            ->add('siteCertificat', 'text', array('label' => 'cle', 'attr' => array('class' => 'form-control input-sm','placeholder'=>'Entrer un mot clé')))
            ->add('dateCertificat', 'date', array('label' => 'cle', 'attr' => array('class' => 'form-control input-sm','placeholder'=>'Entrer un mot clé')))
            ->add('descriptionCertificat', 'textarea', array('label' => 'cle', 'attr' => array('class' => 'form-control input-sm','placeholder'=>'Entrer un mot clé')))
            ->add('linkCertificat', 'text', array('label' => 'cle', 'attr' => array('class' => 'form-control input-sm','placeholder'=>'Entrer un mot clé')))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Utilisateur\UtilisateurBundle\Entity\Certificat'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'utilisateur_utilisateurbundle_certificat';
    }
}

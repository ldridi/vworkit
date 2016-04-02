<?php

namespace Utilisateur\UtilisateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MessageType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('dateAjoutMessage')
            ->add('texteMessage', 'textarea', array('label' => 'cle', 'attr' => array('class' => 'form-control input-sm','placeholder'=>'Tapez votre message')))
            //->add('from')
            //->add('to', 'text', array('label' => 'cle', 'attr' => array('class' => 'form-control input-sm disabled','placeholder'=>'Entrer un mot clé')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Utilisateur\UtilisateurBundle\Entity\Message'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'utilisateur_utilisateurbundle_message';
    }
}

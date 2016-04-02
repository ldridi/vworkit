<?php

namespace Utilisateur\UtilisateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsersType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('usernameCanonical')
            ->add('email')
            ->add('emailCanonical')
            ->add('enabled')
            ->add('salt')
            ->add('password')
            ->add('lastLogin')
            ->add('locked')
            ->add('expired')
            //->add('expiresAt')
            ->add('confirmationToken')
            ->add('passwordRequestedAt')
            //->add('roles')
            //->add('credentialsExpired')
            //->add('credentialsExpireAt')
            ->add('dateAjoutUser')
            ->add('notifNewsUser')
            ->add('notifEmailUser')
            ->add('budgetUser')
            ->add('codeUser')
            ->add('nomUser')
            ->add('prenomUser')
            ->add('adresseUser')
            ->add('sexeUser')
            ->add('deviseUser')
            ->add('descriptionUser')
            ->add('villeUser')
            ->add('etatUser')
            ->add('societeUser')
            ->add('telUser')
            ->add('telSecUser')
            ->add('facebookUser')
            ->add('twitterUser')
            ->add('youtubeUser')
            ->add('googleplusUser')
            ->add('siteUser')
            ->add('githubUser')
            ->add('linkedinUser')
            ->add('competence')
            ->add('image')
            ->add('devise')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Utilisateur\UtilisateurBundle\Entity\Utilisateur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Utilisateur_UtilisateurBundle_users';
    }
}

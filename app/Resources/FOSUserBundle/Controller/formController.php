<?php

namespace Utilisateur\UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Utilisateur\UtilisateurBundle\Form\FormCompteType;

class formController extends Controller
{
    public function formulaireTypeAction()
    {
       $form = $this->createForm(new FormCompteType());
       return $this->render('UtilisateurBundle:Default:test.html.twig',array('form' => $form->createView()));
    }
}

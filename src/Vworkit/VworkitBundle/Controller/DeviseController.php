<?php

namespace Vworkit\VworkitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DeviseController extends Controller
{
    public function DeviseAction()
    {
        $em = $this->getDoctrine()->getManager();
        $devise = $em->getRepository('UtilisateurBundle:Devise')->findAll();
        
        return $this->render('VworkitBundle:Default:frontend/Devise/layout/devise.html.twig', array('devises'=>$devise));
    }
    
    
    public function devisesAction($devise) {
        
        $em = $this->getDoctrine()->getManager();
        $findEntities = $em->getRepository('VworkitBundle:Projet')->byDevise($devise);
        $devise = $em->getRepository('UtilisateurBundle:Devise')->find($devise);
        if (!$devise) {
            throw $this->createNotFoundException('page not found');
        }
        $entities = $this->get('knp_paginator')->paginate($findEntities,$this->get('request')->query->get('page', 1), 4);
        return $this->render('VworkitBundle:Default:frontend/projet/layout/projet.html.twig', array(
                    'entities' => $entities));
    }
    
}

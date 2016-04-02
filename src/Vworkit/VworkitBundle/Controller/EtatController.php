<?php

namespace Vworkit\VworkitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EtatController extends Controller
{
    public function etatAction()
    {
        $em = $this->getDoctrine()->getManager();
        $etat = $em->getRepository('VworkitBundle:Etat')->findAll();
        
        return $this->render('VworkitBundle:Default:frontend/etat/layout/etat.html.twig', array('etats'=>$etat));
    }
    
    
    public function etatsAction($etat) {
        
        $em = $this->getDoctrine()->getManager();
        $findEntities = $em->getRepository('VworkitBundle:Projet')->byEtat($etat);
        $etat = $em->getRepository('VworkitBundle:Etat')->find($etat);
        if (!$etat) {
            throw $this->createNotFoundException('page not found');
        }
        $entities = $this->get('knp_paginator')->paginate($findEntities,$this->get('request')->query->get('page', 1), 4);
        return $this->render('VworkitBundle:Default:frontend/projet/layout/projet.html.twig', array(
                    'entities' => $entities));
    }
    
}

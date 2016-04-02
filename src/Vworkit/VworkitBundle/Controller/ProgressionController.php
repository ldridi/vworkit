<?php

namespace Vworkit\VworkitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProgressionController extends Controller
{
    public function progressionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $progression = $em->getRepository('VworkitBundle:Progression')->findAll();
        
        return $this->render('VworkitBundle:Default:frontend/Progression/layout/progression.html.twig', array('progressions'=>$progression));
    }
    
    
    public function progressionsAction($progression) {
        
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser()->getId();
        $tache = $em->getRepository('VworkitBundle:Tache')->byProgression($progression,$user);
        
        return $this->render('VworkitBundle:Tache:index.html.twig', array(
                    'taches' => $tache));
    }
    
}

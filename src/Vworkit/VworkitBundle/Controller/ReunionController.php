<?php

namespace Vworkit\VworkitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vworkit\VworkitBundle\Entity\Reunion;

class ReunionController extends Controller {
    
    
    
    public function reunionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser()->getId();
        $reunion = $em->getRepository('VworkitBundle:Reunion')->RechercheByUser($user);
        
        return $this->render('VworkitBundle:Default:frontend/Reunion/layout/reunion.html.twig', array('reunions'=>$reunion));
    }
    
    public function tacheReunionAction($reunion)
    {
        $em = $this->getDoctrine()->getManager();
        
        $tache = $em->getRepository('VworkitBundle:Tache')->RechercheByReunion($reunion);
        
        return $this->render('VworkitBundle:Tache:index.html.twig', array(
            'taches' => $tache,
        ));
    }
    
    public function indexAction() {
        return $this->render('VworkitBundle:Default:frontend/acceuil/layout/index.html.twig');
    }

    public function AcceptAction($id, $offre, $nom) {
        $obj = new Reunion();
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $offres = $em->getRepository('VworkitBundle:Offre')->find($offre);
        $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);
        $obj->setNomReunion($nom);
        $obj->setOffre($offres);
        $obj->setPrestataire($entity);
        $obj->setPorteur($user);
        $obj->setDateAjoutReunion(new \DateTime());
        $em->persist($obj);
        $em->flush();

        return $this->render('VworkitBundle:Default:frontend/acceuil/layout/index.html.twig');
    }

}

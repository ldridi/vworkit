<?php

namespace Vworkit\VworkitBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vworkit\VworkitBundle\Entity\Competence;
//use Vworkit\VworkitBundle\Form\CategoriesType;

/**
 * Categories controller.
 *
 */
class CompetenceController extends Controller {

    

   

    public function competenceAction($competence,$categorie) {

        $em = $this->getDoctrine()->getManager();
        $findEntities = $em->getRepository('VworkitBundle:Projet')->byCompetence($competence);
        
        $categories = $em->getRepository('VworkitBundle:Categories')->find($categorie);
        
            $competences = $em->getRepository('VworkitBundle:Competence')->byCategorie($categorie);
        
        
        $entities = $this->get('knp_paginator')->paginate($findEntities,$this->get('request')->query->get('page', 1), 4);
        return $this->render('VworkitBundle:Default:frontend/projet/layout/projet.html.twig', array(
                    'entities' => $entities,'competences'=>$competences));
    }

    public function competenceUserAction($competence,$categorie) {

        $em = $this->getDoctrine()->getManager();
        $findEntities = $em->getRepository('UtilisateurBundle:utilisateur')->byCompetence($competence);
        
        $categories = $em->getRepository('VworkitBundle:Categories')->find($categorie);
        
            $competences = $em->getRepository('VworkitBundle:Competence')->byCategorie($categorie);
        
        
        $entities = $this->get('knp_paginator')->paginate($findEntities,$this->get('request')->query->get('page', 1), 4);
        return $this->render('UtilisateurBundle:Utilisateur:alluser.html.twig', array(
                    'entities' => $entities,'competences'=>$competences));
    }

}

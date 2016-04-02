<?php

namespace Vworkit\VworkitBundle\Controller;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Vworkit\VworkitBundle\Form\formFiltreType;
use Vworkit\VworkitBundle\Form\formRechercheType;

class projetFiltreController extends Controller {

    
    public function categorie_indexAction($categorie) {
        $form = $this->createForm(new formFiltreType());
        $em = $this->getDoctrine()->getManager();
        $projets = $em->getRepository('VworkitBundle:Projet')->byCategorie($categorie);
        $categorie = $em->getRepository('VworkitBundle:Categories')->find($categorie);
        if (!$categorie)
            throw $this->createNotFoundException('page not found');
        return $this->render('VworkitBundle:Default:frontend/projet/layout/projet.html.twig', array('form' => $form->createView(),
                    'projets' => $projets));
    }
    
    public function categorieAction($categorie) {
        $form = $this->createForm(new formFiltreType());
        $em = $this->getDoctrine()->getManager();
        $projets = $em->getRepository('VworkitBundle:Projet')->byCategorie($categorie);
        $categorie = $em->getRepository('VworkitBundle:Categories')->find($categorie);
        if (!$categorie) {
            throw $this->createNotFoundException('page not found');
        }
        return $this->render('VworkitBundle:Default:frontend/projet/layout/projet.html.twig', array('form' => $form->createView(),
                    'projets' => $projets));
    }

    public function budgetAction($budget) {
        $form = $this->createForm(new formFiltreType());
        $em = $this->getDoctrine()->getManager();
        $projets = $em->getRepository('VworkitBundle:Projet')->byBudget($budget);
        $budget = $em->getRepository('VworkitBundle:Budget')->find($budget);
        if (!$budget) {
            throw $this->createNotFoundException('page not found');
        }
        return $this->render('VworkitBundle:Default:frontend/projet/layout/projet.html.twig', array('form' => $form->createView(),
                    'projets' => $projets));
    }
    
    public function etatAction($etat) {
        
        $em = $this->getDoctrine()->getManager();
        $projets = $em->getRepository('VworkitBundle:Etat')->byEtat($etat);
        $etat = $em->getRepository('VworkitBundle:Budget')->find($etat);
        if (!$etat) {
            throw $this->createNotFoundException('page not found');
        }
        return $this->render('VworkitBundle:Default:frontend/projet/layout/projet.html.twig', array('form' => $form->createView(),
                    'projets' => $projets));
    }
    
    public function projetAction() {

        $form = $this->createForm(new formFiltreType());
        $em = $this->getDoctrine()->getManager();
        $projets = $em->getRepository('VworkitBundle:Projet')->findAll();
        return $this->render('VworkitBundle:Default:frontend/projet/layout/projet.html.twig', array('form' => $form->createView(), 'projets' => $projets));
    }

    public function rechercheAction() {
        $form = $this->createForm(new formRechercheType());
        return $this->render('VworkitBundle:Default:frontend/Recherche/layout/recherche.html.twig', array('form' => $form->createView()));
    }

    public function rechercheTraitementAction() {
        $form1 = $this->createForm(new formRechercheType());
        $form = $this->createForm(new formRechercheType());
        if ($this->get('request')->getMethod() == 'POST') {

            $form->bind($this->get('request'));
            $em = $this->getDoctrine()->getManager();
            $projets = $em->getRepository('VworkitBundle:Projet')->recherche($form['recherche']->getData());
        } else {
            throw $this->createNotFoundException('page not found');
        }


        return $this->render('VworkitBundle:Default:frontend/projet/layout/projet.html.twig', array('form' => $form->createView(), 'projets' => $projets));
    }

}

<?php

namespace Utilisateur\UtilisateurBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Utilisateur\UtilisateurBundle\Entity\Utilisateur;
use Utilisateur\UtilisateurBundle\Entity\Visite;
use Utilisateur\UtilisateurBundle\Form\UtilisateurType;
use Utilisateur\UtilisateurBundle\Form\formRechercheLocationType;
use Utilisateur\UtilisateurBundle\Form\formRechercheZipType;
/**
 * Utilisateur controller.
 *
 */
class UtilisateurController extends Controller
{

    /**
     * Lists all Utilisateur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $securityContext = $this->container->get('security.context');
        if ($securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
            $id = $this->container->get('security.context')->getToken()->getUser()->getId();
            $findEntities = $em->getRepository('UtilisateurBundle:Utilisateur')->findByException($id);
        }else{
            $findEntities = $em->getRepository('UtilisateurBundle:Utilisateur')->findAll();
        }
        $entities = $this->get('knp_paginator')->paginate($findEntities,$this->get('request')->query->get('page', 1), 10);
        return $this->render('UtilisateurBundle:Utilisateur:alluser.html.twig', array(
            'entities' => $entities,
           
        ));
    }
    /**
     * Creates a new Utilisateur entity.
     *
     */
    public function createAction(Request $request)
    {
        
        $entity = new Utilisateur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        //$entity->setNavigateurUser($navigateurUser);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('utilisateur_show', array('id' => $entity->getId())));
        }

        return $this->render('UtilisateurBundle:Utilisateur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Utilisateur entity.
     *
     * @param Utilisateur $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Utilisateur $entity)
    {
        $form = $this->createForm(new UtilisateurType(), $entity, array(
            'action' => $this->generateUrl('utilisateur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Utilisateur entity.
     *
     */
    public function newAction()
    {
        $entity = new Utilisateur();
        $form   = $this->createCreateForm($entity);

        return $this->render('UtilisateurBundle:Utilisateur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Utilisateur entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $useractuel= $this->container->get('security.context')->getToken()->getUser();
        $recoms = $em->getRepository('UtilisateurBundle:Recommandation')->ByRecom($id);
        $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);
        $entities = $em->getRepository('UtilisateurBundle:Portfolio')->ByPortfolio($id);
        $educations = $em->getRepository('UtilisateurBundle:Education')->ByEducation($id);
        $emplois = $em->getRepository('UtilisateurBundle:Emploi')->byEmploi($id);
        $plaisirs = $em->getRepository('UtilisateurBundle:Plaisir')->byPlaisir($id);
        $certifs = $em->getRepository('UtilisateurBundle:Certificat')->byCertif($id);
        $langs = $em->getRepository('UtilisateurBundle:Langue')->bylangue($id);
        $projets = $em->getRepository('VworkitBundle:Projet')->byUser($id);
        $recoms = $em->getRepository('UtilisateurBundle:Recommandation')->ByRecom($id);
        if (!$entity ) {
            throw $this->createNotFoundException('Unable to find Utilisateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $visite = new Visite();
        $visite->setDatevisite(new \DateTime());
        $visite->setFrom($useractuel);
        $visite->setTo($entity);
        $em->persist($visite);
        $em->flush();
        return $this->render('UtilisateurBundle:Utilisateur:show.html.twig', array(
            'entity'      => $entity,
            'entities'=>$entities,
            'educations'=>$educations,
            'emplois'=>$emplois,
            'plaisirs'=>$plaisirs,
            'certifs'=>$certifs,
            'langs'=>$langs,
            'projets'=>$projets,
            'recoms'=>$recoms,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Utilisateur entity.
     *
     */
    public function editAction()
    {
        
        $id= $this->container->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Utilisateur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Default:info.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Utilisateur entity.
    *
    * @param Utilisateur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Utilisateur $entity)
    {
        $form = $this->createForm(new UtilisateurType(), $entity, array(
            'action' => $this->generateUrl('utilisateur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Mettre à jour les données','attr'=>array('class'=>'btn btn-sm btn-primary')));

        return $form;
    }
    /**
     * Edits an existing Utilisateur entity.
     *
     */
    public function updateAction(Request $request)
    {
        
        $id= $this->container->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Utilisateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice','Vos informations ont ete enregistré avec succe');
            return $this->redirect($this->generateUrl('utilisateur_edit', array('id' => $id)));
        }

        return $this->render('UtilisateurBundle:Utilisateur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Utilisateur entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Utilisateur entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('utilisateur'));
    }

    /**
     * Creates a form to delete a Utilisateur entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('utilisateur_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    public function locationAction() {
        $form = $this->createForm(new formRechercheLocationType());
        return $this->render('UtilisateurBundle:Recherche:layout/recherche.html.twig', array('form' => $form->createView()));
    }
    
    public function rechercheLocationAction() {
        
        $form = $this->createForm(new formRechercheLocationType());
        if ($this->get('request')->getMethod() == 'POST') {

            $form->bind($this->get('request'));
            $em = $this->getDoctrine()->getManager();
            $findEntities = $em->getRepository('UtilisateurBundle:Utilisateur')->recherche($form['location']->getData());
        } else {
            throw $this->createNotFoundException('page not found');
        }
        $entities = $this->get('knp_paginator')->paginate($findEntities,$this->get('request')->query->get('page', 1), 4);

        return $this->render('UtilisateurBundle:Utilisateur:alluser.html.twig', array('form' => $form->createView(), 'entities' => $entities));
    }

    public function zipAction() {
        $form = $this->createForm(new formRechercheZipType());
        return $this->render('UtilisateurBundle:Recherche:layout/recherchezip.html.twig', array('form' => $form->createView()));
    }

    public function rechercheZipAction() {
        
        $form = $this->createForm(new formRechercheZipType());
        if ($this->get('request')->getMethod() == 'POST') {

            $form->bind($this->get('request'));
            $em = $this->getDoctrine()->getManager();
            $findEntities = $em->getRepository('UtilisateurBundle:Utilisateur')->recherchezip($form['zip']->getData());
        } else {
            throw $this->createNotFoundException('page not found');
        }
        $entities = $this->get('knp_paginator')->paginate($findEntities,$this->get('request')->query->get('page', 1), 4);

        return $this->render('UtilisateurBundle:Utilisateur:alluser.html.twig', array('form' => $form->createView(), 'entities' => $entities));
    }

    public function userdescAction()
    {
        $em = $this->getDoctrine()->getManager();

        $findEntities = $em->getRepository('UtilisateurBundle:Utilisateur')->findbydesc();
        $entities = $this->get('knp_paginator')->paginate($findEntities,$this->get('request')->query->get('page', 1), 2);
        return $this->render('UtilisateurBundle:Utilisateur:alluser.html.twig', array(
            'entities' => $entities,
           
        ));
    }

    public function userascAction()
    {
        $em = $this->getDoctrine()->getManager();

        $findEntities = $em->getRepository('UtilisateurBundle:Utilisateur')->findbyasc();
        $entities = $this->get('knp_paginator')->paginate($findEntities,$this->get('request')->query->get('page', 1), 2);
        return $this->render('UtilisateurBundle:Utilisateur:alluser.html.twig', array(
            'entities' => $entities,
           
        ));
    }
}

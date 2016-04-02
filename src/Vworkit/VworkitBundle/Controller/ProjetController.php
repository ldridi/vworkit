<?php

namespace Vworkit\VworkitBundle\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vworkit\VworkitBundle\Form\ProjetType;
use Vworkit\VworkitBundle\Entity\Projet;
use Vworkit\VworkitBundle\Entity\Offre;
use Utilisateur\UtilisateurBundle\Entity\Historique;

use Vworkit\VworkitBundle\Form\formAjouterOffreType;
use Vworkit\VworkitBundle\Form\formRechercheType;

/**
 * Projet controller.
 *
 */
class ProjetController extends Controller
{
    public function rechercheAction() {
        $form = $this->createForm(new formRechercheType());
        return $this->render('VworkitBundle:Default:frontend/Recherche/layout/recherche.html.twig', array('form' => $form->createView()));
    }
    
    public function rechercheTraitementAction() {
        
        $form = $this->createForm(new formRechercheType());
        if ($this->get('request')->getMethod() == 'POST') {

            $form->bind($this->get('request'));
            $em = $this->getDoctrine()->getManager();
            $findEntities = $em->getRepository('VworkitBundle:Projet')->recherche($form['recherche']->getData());
        } else {
            throw $this->createNotFoundException('page not found');
        }
        $entities = $this->get('knp_paginator')->paginate($findEntities,$this->get('request')->query->get('page', 1), 4);

        return $this->render('VworkitBundle:Default:frontend/projet/layout/projet.html.twig', array('form' => $form->createView(), 'entities' => $entities));
    }
    
    
    /**
     * Lists all Projet entities.
     *
     */
    public function listerAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id = $this->container->get('security.context')->getToken()->getUser()->getId();
        $entities = $em->getRepository('VworkitBundle:Projet')->byUser($id);
        $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);
        return $this->render('VworkitBundle:Default:frontend/projet/layout/liste.html.twig', array(
            'entities' => $entities,
            'entity'=>$entity,
        ));
    }
    
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $securityContext = $this->container->get('security.context');
        if ($securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
            $id = $this->container->get('security.context')->getToken()->getUser()->getId();
            $findEntities = $em->getRepository('VworkitBundle:Projet')->findByException($id);
        }else{
            $findEntities = $em->getRepository('VworkitBundle:Projet')->findAll();
        }
        
        $entities = $this->get('knp_paginator')->paginate($findEntities,$this->get('request')->query->get('page', 1), 10);
        return $this->render('VworkitBundle:Default:frontend/projet/layout/projet.html.twig', array(
                    'entities' => $entities
        ));
        

        
    }
    
    /**
     * Displays a form to create a new Projet entity.
     *
     */
    public function deposerAction(Request $request)
    {
        $entity = new Projet();
        $form   = $this->createCreateForm($entity);
        
        
        return $this->render('VworkitBundle:Default:frontend/projet/layout/deposer.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
    /**
     * Creates a new Projet entity.
     *
     */
    public function createAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array('message' => 'You can access this only using Ajax!'), 400);
        }
        $entity = new Projet();
        $em = $this->getDoctrine()->getManager();
        $entity->setUser($this->container->get('security.context')->getToken()->getUser());
        
        $entity->setCreatedValue();

        
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return new JsonResponse(array('message' => 'Success!'), 200);
            //return $this->redirect($this->generateUrl('projet_show', array('id' => $entity->getId())));
        }

        $response = new JsonResponse(
                array(
            'message' => 'Error',
            'form' => $this->renderView('VworkitBundle:Default:frontend/projet/layout/form.html.twig', array(
                'entity' => $entity,
                'form' => $form->createView(),
            ))), 400);

        return $response;
    }

    /**
     * Creates a form to create a Projet entity.
     *
     * @param Projet $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Projet $entity)
    {
        $form = $this->createForm(new ProjetType(), $entity, array(
            'action' => $this->generateUrl('projet_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Déposer le projet','attr'=>array('class'=>'btn btn-primary btn-sm')));

        return $form;
    }

    

    /**
     * Finds and displays a Projet entity.
     *
     */
    public function voirAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('VworkitBundle:Projet')->findAll();
        $entity = $em->getRepository('VworkitBundle:Projet')->find($id);
        $user=$this->container->get('security.context')->getToken()->getUser();
        
        $offres = $em->getRepository('VworkitBundle:Offre')->byProjet($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projet entity.');
        }
        $form = $this->createForm(new formAjouterOffreType());
        if ($this->get('request')->getMethod() == 'POST') {
            $obj = new Offre();
            $form->bind($this->get('request'));
            
            $obj->setDescriptionOffre($form['descriptionOffre']->getData());
            $obj->setBudgetOffre($form['budgetOffre']->getData());
            $obj->setDureeOffre($form['dureeOffre']->getData());
            $obj->setProjet($entity);
            $obj->setUser($user);
            $obj->setDateAjoutOffre(new \DateTime());

            $em->persist($obj);
            $em->flush();
            return $this->redirect($this->generateUrl('projet_affiche', array(
            'entities'      => $entities,
            
        )));
        }
            $securityContext = $this->container->get('security.context');
            if ($securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
            $historique=new Historique();
            $historique->setProjet($entity);
            $historique->setUser($user);
            $historique->setDateAjoutHistorique(new \DateTime());
            $em->persist($historique);
            $em->flush();
        
        }
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VworkitBundle:Default:frontend/projet/layout/voir.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'form' => $form->createView(),
            'offres' => $offres,
        ));
    }

    /**
     * Displays a form to edit an existing Projet entity.
     *
     */
    public function modifierAction($id)
    {
        $em = $this->getDoctrine()->getManager();
       
        $entity = $em->getRepository('VworkitBundle:Projet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projet entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VworkitBundle:Default:frontend/projet/layout/modifier.html.twig', array(
            'entity'      => $entity,
            
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Projet entity.
    *
    * @param Projet $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Projet $entity)
    {
        $form = $this->createForm(new ProjetType(), $entity, array(
            'action' => $this->generateUrl('projet_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Mette à jour les données','attr'=>array('class'=>'btn btn-primary btn-sm')));

        return $form;
    }
    /**
     * Edits an existing Projet entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VworkitBundle:Projet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('projet_edit', array('id' => $id)));
        }

        return $this->render('VworkitBundle:Projet:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Projet entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VworkitBundle:Projet')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Projet entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('projet_affiche'));
    }

    /**
     * Creates a form to delete a Projet entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projet_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer le projet','attr'=>array('class'=>'btn btn-primary btn-sm pull-right')))
            ->getForm()
        ;
    }
}

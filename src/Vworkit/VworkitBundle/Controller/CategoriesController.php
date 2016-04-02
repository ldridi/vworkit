<?php

namespace Vworkit\VworkitBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vworkit\VworkitBundle\Entity\Categories;
use Vworkit\VworkitBundle\Form\CategoriesType;

/**
 * Categories controller.
 *
 */
class CategoriesController extends Controller {

    public function menuAction() {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('VworkitBundle:Categories')->findAll();

        //$nombreProjet = $em->getRepository('VworkitBundle:Projet');
        //$nb = $nombreProjet->getNb();
        return $this->render('VworkitBundle:Categories:menu.html.twig', array('categories' => $categories, 'nb' => 1));
            //var_dump($a);
        }
       
        
      
        
    
    public function menuUserAction() {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('VworkitBundle:Categories')->findAll();

        //$nombreProjet = $em->getRepository('VworkitBundle:Projet');
        //$nb = $nombreProjet->getNb();
        return $this->render('VworkitBundle:Categories:menu_user.html.twig', array('categories' => $categories, 'nb' => 1));
    }
    
    public function catIndexAction() {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('VworkitBundle:Categories')->byCategorieindex();
        return $this->render('VworkitBundle:Categories:categorie_index.html.twig', array('categories' => $categories));
    }

    public function categorieAction($categorie) {

        $em = $this->getDoctrine()->getManager();
        $findEntities = $em->getRepository('VworkitBundle:Projet')->byCategorie($categorie);
        
        $categories = $em->getRepository('VworkitBundle:Categories')->find($categorie);
        
            $competences = $em->getRepository('VworkitBundle:Competence')->byCategorie($categorie);
            
            
            
            
        
        $entities = $this->get('knp_paginator')->paginate($findEntities,$this->get('request')->query->get('page', 1), 4);
        return $this->render('VworkitBundle:Default:frontend/projet/layout/projet.html.twig', array(
                    'entities' => $entities,'competences'=>$competences,'categories'=>$categories));
    }
    
    public function categorieUserAction($categorie) {

        $em = $this->getDoctrine()->getManager();
        $findEntities = $em->getRepository('UtilisateurBundle:Utilisateur')->byCompetence($categorie);
        
        $categories = $em->getRepository('VworkitBundle:Categories')->find($categorie);
        
            $competences = $em->getRepository('VworkitBundle:Competence')->byCategorie($categorie);
            
            
            
            
        
        $entities = $this->get('knp_paginator')->paginate($findEntities,$this->get('request')->query->get('page', 1), 4);
        return $this->render('UtilisateurBundle:Utilisateur:alluser.html.twig', array(
                    'entities' => $entities,'competences'=>$competences,'categories'=>$categories));
    }
    
    /**
     * Lists all Categories entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VworkitBundle:Categories')->findAll();

        return $this->render('VworkitBundle:Categories:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new Categories entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Categories();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $entity->setDateAjoutCategories(new \DateTime());
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_categorie_show', array('id' => $entity->getId())));
        }

        return $this->render('VworkitBundle:Categories:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Categories entity.
     *
     * @param Categories $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Categories $entity) {
        $form = $this->createForm(new CategoriesType(), $entity, array(
            'action' => $this->generateUrl('admin_categorie_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Ajouter une categorie','attr'=>array('class'=>'btn btn-primary btn-sm')));

        return $form;
    }

    /**
     * Displays a form to create a new Categories entity.
     *
     */
    public function newAction() {
        $entity = new Categories();
        $form = $this->createCreateForm($entity);

        return $this->render('VworkitBundle:Categories:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Categories entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VworkitBundle:Categories')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categories entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VworkitBundle:Categories:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Categories entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VworkitBundle:Categories')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categories entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VworkitBundle:Categories:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Categories entity.
     *
     * @param Categories $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Categories $entity) {
        $form = $this->createForm(new CategoriesType(), $entity, array(
            'action' => $this->generateUrl('admin_categorie_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Mettre a jour','attr'=>array('class'=>'btn btn-success btn-sm')));

        return $form;
    }

    /**
     * Edits an existing Categories entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VworkitBundle:Categories')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categories entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_categorie_edit', array('id' => $id)));
        }

        return $this->render('VworkitBundle:Categories:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Categories entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VworkitBundle:Categories')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Categories entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_categorie'));
    }

    /**
     * Creates a form to delete a Categories entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_categorie_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Supprimer la categorie','attr'=>array('class'=>'btn btn-danger btn-sm')))
                        ->getForm()
        ;
    }

}

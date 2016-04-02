<?php

namespace Vworkit\VworkitBundle\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vworkit\VworkitBundle\Entity\Budget;
use Vworkit\VworkitBundle\Form\BudgetType;

/**
 * Budget controller.
 *
 */
class BudgetController extends Controller {

    
    public function budgetAction() {
        $em = $this->getDoctrine()->getManager();
        $budget = $em->getRepository('VworkitBundle:Budget')->findAll();

        return $this->render('VworkitBundle:Default:frontend/Budget/layout/budget.html.twig', array('budgets' => $budget));
    }

    public function budgetsAction($budget) {

        $em = $this->getDoctrine()->getManager();
        $findEntities = $em->getRepository('VworkitBundle:Projet')->byBudget($budget);
        $budget = $em->getRepository('VworkitBundle:Budget')->find($budget);
        if (!$budget) {
            throw $this->createNotFoundException('page not found');
        }
        //$competences = $em->getRepository('VworkitBundle:Competence')->byCategorie($categorie);
        $entities = $this->get('knp_paginator')->paginate($findEntities,$this->get('request')->query->get('page', 1), 4);
        return $this->render('VworkitBundle:Default:frontend/projet/layout/projet.html.twig', array(
                    'entities' => $entities));
    }

    /**
     * Lists all Budget entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VworkitBundle:Budget')->findAll();

        return $this->render('VworkitBundle:Budget:index.html.twig', array(
                    'entities' => $entities,
        ));
    }
    
    /**
     * Displays a form to create a new Budget entity.
     *
     */
    public function newAction(Request $request) {
        $entity = new Budget();
        $form = $this->createCreateForm($entity);

        return $this->render('VworkitBundle:Budget:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }
    
    /**
     * Creates a new Budget entity.
     *
     */
    public function createAction(Request $request) {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array('message' => 'You can access this only using Ajax!'), 400);
        }
        $entity = new Budget();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return new JsonResponse(array('message' => 'Success!'), 200);
            //return $this->redirect($this->generateUrl('admin_budget_show', array('id' => $entity->getId())));
        }
        
        $response = new JsonResponse(
                array(
            'message' => 'Error',
            'form' => $this->renderView('VworkitBundle:Budget:form.html.twig', array(
                'entity' => $entity,
                'form' => $form->createView(),
            ))), 400);

        return $response;
        /*return $this->render('VworkitBundle:Budget:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));*/
    }

    /**
     * Creates a form to create a Budget entity.
     *
     * @param Budget $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Budget $entity) {
        $form = $this->createForm(new BudgetType(), $entity, array(
            'action' => $this->generateUrl('admin_budget_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    

    /**
     * Finds and displays a Budget entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VworkitBundle:Budget')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Budget entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VworkitBundle:Budget:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Budget entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VworkitBundle:Budget')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Budget entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VworkitBundle:Budget:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Budget entity.
     *
     * @param Budget $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Budget $entity) {
        $form = $this->createForm(new BudgetType(), $entity, array(
            'action' => $this->generateUrl('admin_budget_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Budget entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VworkitBundle:Budget')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Budget entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_budget_edit', array('id' => $id)));
        }

        return $this->render('VworkitBundle:Budget:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Budget entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VworkitBundle:Budget')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Budget entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_budget'));
    }

    /**
     * Creates a form to delete a Budget entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_budget_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}

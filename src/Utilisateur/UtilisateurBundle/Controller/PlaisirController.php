<?php

namespace Utilisateur\UtilisateurBundle\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Utilisateur\UtilisateurBundle\Entity\Plaisir;
use Utilisateur\UtilisateurBundle\Form\PlaisirType;

/**
 * Plaisir controller.
 *
 */
class PlaisirController extends Controller
{

    /**
     * Lists all Plaisir entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UtilisateurBundle:Plaisir')->findAll();

        return $this->render('UtilisateurBundle:Plaisir:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Plaisir entity.
     *
     */
    public function createAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array('message' => 'You can access this only using Ajax!'), 400);
        }
        $entity = new Plaisir();
        $entity->setUser($this->container->get('security.context')->getToken()->getUser());
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        //$entities = $em->getRepository('UtilisateurBundle:Plaisir')->byUser($id);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            //$this->get('session')->getFlashBag()->add('plaisir','Vos informations ont ete enregistré avec succe');
            //return $this->redirect($this->generateUrl('utilisateur_apropos', array('id' => $entity->getId())));
            return new JsonResponse(array('message' => 'Success!'), 200);
        }

        /*return $this->render('UtilisateurBundle:Plaisir:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            
        ));*/
        $response = new JsonResponse(
                array(
            'message' => 'Error',
            'form' => $this->renderView('UtilisateurBundle:Plaisir:form.html.twig', array(
                'entity' => $entity,
                'form' => $form->createView(),
            ))), 400);

        return $response;
    }
    
    
    /**
     * Creates a form to create a Plaisir entity.
     *
     * @param Plaisir $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Plaisir $entity)
    {
        $form = $this->createForm(new PlaisirType(), $entity, array(
            'action' => $this->generateUrl('plaisir_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Ajouter nouveau Loisir','attr'=>array('class'=>'btn btn-sm btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new Plaisir entity.
     *
     */
    public function newAction(Request $request)
    {
        $entity = new Plaisir();
        $form   = $this->createCreateForm($entity);

        return $this->render('UtilisateurBundle:Plaisir:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Plaisir entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Plaisir')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Plaisir entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Plaisir:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Plaisir entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Plaisir')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Plaisir entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Plaisir:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Plaisir entity.
    *
    * @param Plaisir $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Plaisir $entity)
    {
        $form = $this->createForm(new PlaisirType(), $entity, array(
            'action' => $this->generateUrl('plaisir_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Plaisir entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Plaisir')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Plaisir entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('plaisir_edit', array('id' => $id)));
        }

        return $this->render('UtilisateurBundle:Plaisir:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Plaisir entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UtilisateurBundle:Plaisir')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Plaisir entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('plaisir'));
    }

    /**
     * Creates a form to delete a Plaisir entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('plaisir_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

<?php

namespace Utilisateur\UtilisateurBundle\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Utilisateur\UtilisateurBundle\Entity\Emploi;
use Utilisateur\UtilisateurBundle\Form\EmploiType;

/**
 * Emploi controller.
 *
 */
class EmploiController extends Controller
{

    /**
     * Lists all Emploi entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UtilisateurBundle:Emploi')->findAll();

        return $this->render('UtilisateurBundle:Emploi:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Emploi entity.
     *
     */
    public function createAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array('message' => 'You can access this only using Ajax!'), 400);
        }
        $entity = new Emploi();
        $entity->setUser($this->container->get('security.context')->getToken()->getUser());
        $entity->setDateAjoutEmploi(new \DateTime());
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            //$msg = $this->get('session')->getFlashBag()->add('emploi','Vos informations ont ete enregistré avec succe');
            //return $this->redirect($this->generateUrl('utilisateur_apropos', array('id' => $entity->getId())));
            return new JsonResponse(array('message' => 'Success!'), 200);
        }

        /*return $this->render('UtilisateurBundle:Emploi:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));*/
        $response = new JsonResponse(
                array(
            'message' => 'Error',
            'form' => $this->renderView('UtilisateurBundle:Emploi:form.html.twig', array(
                'entity' => $entity,
                'form' => $form->createView(),
            ))), 400);

        return $response;
    }

    /**
     * Creates a form to create a Emploi entity.
     *
     * @param Emploi $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Emploi $entity)
    {
        $form = $this->createForm(new EmploiType(), $entity, array(
            'action' => $this->generateUrl('emploi_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Ajouter nouveau emploi','attr'=>array('class'=>'btn btn-sm btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new Emploi entity.
     *
     */
    public function newAction(Request $request)
    {
        $entity = new Emploi();
        $form   = $this->createCreateForm($entity);

        return $this->render('UtilisateurBundle:Emploi:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Emploi entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Emploi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Emploi entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Emploi:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Emploi entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Emploi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Emploi entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Emploi:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Emploi entity.
    *
    * @param Emploi $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Emploi $entity)
    {
        $form = $this->createForm(new EmploiType(), $entity, array(
            'action' => $this->generateUrl('emploi_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Emploi entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Emploi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Emploi entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('emploi_edit', array('id' => $id)));
        }

        return $this->render('UtilisateurBundle:Emploi:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Emploi entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UtilisateurBundle:Emploi')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Emploi entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('emploi'));
    }

    /**
     * Creates a form to delete a Emploi entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('emploi_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

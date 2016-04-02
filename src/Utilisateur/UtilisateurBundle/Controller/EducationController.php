<?php

namespace Utilisateur\UtilisateurBundle\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Utilisateur\UtilisateurBundle\Entity\Education;
use Utilisateur\UtilisateurBundle\Form\EducationType;

/**
 * Education controller.
 *
 */
class EducationController extends Controller
{

    /**
     * Lists all Education entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UtilisateurBundle:Education')->findAll();

        return $this->render('UtilisateurBundle:Education:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Education entity.
     *
     */
    public function createAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array('message' => 'You can access this only using Ajax!'), 400);
        }
        $entity = new Education();
        $entity->setUser($this->container->get('security.context')->getToken()->getUser());

        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return new JsonResponse(array('message' => 'Success!'), 200);
        }

        $response = new JsonResponse(
            array(
                'message' => 'Error',
                'form' => $this->renderView('UtilisateurBundle:Education:form.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ))), 400);

        return $response;
    }

    /**
     * Creates a form to create a Education entity.
     *
     * @param Education $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Education $entity)
    {
        $form = $this->createForm(new EducationType(), $entity, array(
            'action' => $this->generateUrl('education_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Ajouter nouveau education','attr'=>array('class'=>'btn btn-sm btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new Education entity.
     *
     */
    public function newAction(Request $request)
    {
        $entity = new Education();
        $form   = $this->createCreateForm($entity);

        return $this->render('UtilisateurBundle:Education:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Education entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Education')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Education entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Utilisateur:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Education entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Education')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Education entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Education:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Education entity.
    *
    * @param Education $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Education $entity)
    {
        $form = $this->createForm(new EducationType(), $entity, array(
            'action' => $this->generateUrl('education_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Education entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Education')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Education entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('education_edit', array('id' => $id)));
        }

        return $this->render('UtilisateurBundle:Education:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Education entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UtilisateurBundle:Education')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Education entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('education'));
    }

    /**
     * Creates a form to delete a Education entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('education_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
            ;
    }
}

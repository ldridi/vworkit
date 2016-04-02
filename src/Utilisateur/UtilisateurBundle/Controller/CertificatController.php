<?php

namespace Utilisateur\UtilisateurBundle\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Utilisateur\UtilisateurBundle\Entity\Certificat;
use Utilisateur\UtilisateurBundle\Form\CertificatType;

/**
 * Certificat controller.
 *
 */
class CertificatController extends Controller
{

    /**
     * Lists all Certificat entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UtilisateurBundle:Certificat')->findAll();

        return $this->render('UtilisateurBundle:Certificat:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Certificat entity.
     *
     */
    public function createAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array('message' => 'You can access this only using Ajax!'), 400);
        }
        $entity = new Certificat();
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
                'form' => $this->renderView('UtilisateurBundle:Certificat:form.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ))), 400);

        return $response;
    }

    /**
     * Creates a form to create a Certificat entity.
     *
     * @param Certificat $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Certificat $entity)
    {
        $form = $this->createForm(new CertificatType(), $entity, array(
            'action' => $this->generateUrl('certificat_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Ajouter nouvelle certificat','attr'=>array('class'=>'btn btn-sm btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new Certificat entity.
     *
     */
    public function newAction(Request $request)
    {
        $entity = new Certificat();
        $form   = $this->createCreateForm($entity);

        return $this->render('UtilisateurBundle:Certificat:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Certificat entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Certificat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Certificat entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Certificat:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Certificat entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Certificat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Certificat entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Certificat:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Certificat entity.
    *
    * @param Certificat $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Certificat $entity)
    {
        $form = $this->createForm(new CertificatType(), $entity, array(
            'action' => $this->generateUrl('certificat_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Certificat entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Certificat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Certificat entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('certificat_edit', array('id' => $id)));
        }

        return $this->render('UtilisateurBundle:Certificat:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Certificat entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UtilisateurBundle:Certificat')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Certificat entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('certificat'));
    }

    /**
     * Creates a form to delete a Certificat entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('certificat_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
            ;
    }
}

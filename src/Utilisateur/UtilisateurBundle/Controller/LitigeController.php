<?php

namespace Utilisateur\UtilisateurBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Utilisateur\UtilisateurBundle\Entity\Litige;
use Utilisateur\UtilisateurBundle\Form\LitigeType;

/**
 * Plaisir controller.
 *
 */
class LitigeController extends Controller
{

    /**
     * Lists all Plaisir entities.
     *
     */
    public function litigeAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UtilisateurBundle:Litige')->findAll();

        return $this->render('UtilisateurBundle:Default:litige.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Plaisir entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Litige();
        $entity->setFrom($this->container->get('security.context')->getToken()->getUser());
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        //$entities = $em->getRepository('UtilisateurBundle:Plaisir')->byUser($id);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setDateAjoutLitige(new \DateTime());
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('litige','Votre formulaire a ete bien enregistré. Nous vous contacterons le plus tot possible ! Merci pour votre fidelité !');
            return $this->redirect($this->generateUrl('litige'));
        }

        return $this->render('UtilisateurBundle:Default:litige.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            
        ));
    }
    
    
    /**
     * Creates a form to create a Plaisir entity.
     *
     * @param Plaisir $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Litige $entity)
    {
        $form = $this->createForm(new LitigeType(), $entity, array(
            'action' => $this->generateUrl('litige_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Envoyer le probleme','attr'=>array('class'=>'btn btn-sm btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new Plaisir entity.
     *
     */
    public function newAction()
    {
        $entity = new Litige();
        $form   = $this->createCreateForm($entity);

        return $this->render('UtilisateurBundle:Default:litige.html.twig', array(
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

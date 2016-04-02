<?php

namespace Utilisateur\UtilisateurBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Utilisateur\UtilisateurBundle\Entity\Reponse;
use Utilisateur\UtilisateurBundle\Form\ReponseType;

/**
 * Reponse controller.
 *
 */
class ReponseController extends Controller
{

    /**
     * Lists all Reponse entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UtilisateurBundle:Reponse')->findAll();

        return $this->render('UtilisateurBundle:Reponse:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Reponse entity.
     *
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new Reponse();
        $form = $this->createCreateForm($entity);
        $session = $this->getRequest()->getSession();
        $foo = $session->get('msg');
        $entities = $em->getRepository('UtilisateurBundle:Message')->find($foo);
        $form->handleRequest($request);
        $id = $this->container->get('security.context')->getToken()->getUser();
        $entity->setUser($id);
        $entity->setMessage($entities);
        $entity->setDateAjoutReponse(new \DateTime());
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reponse_new', array('id' => $foo)));
        }

        return $this->render('UtilisateurBundle:Reponse:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Reponse entity.
     *
     * @param Reponse $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Reponse $entity)
    {
        $form = $this->createForm(new ReponseType(), $entity, array(
            'action' => $this->generateUrl('reponse_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Repondre','attr'=>array('class'=>'btn btn-sm btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new Reponse entity.
     *
     */
    public function newAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new Reponse();
        $session = $this->getRequest()->getSession();
        $session->set('msg', $id);
        $form   = $this->createCreateForm($entity);
        $msg = $em->getRepository('UtilisateurBundle:Message')->findBymsg($id);
        $reponses = $em->getRepository('UtilisateurBundle:Reponse')->findByrep($id);
        return $this->render('UtilisateurBundle:Reponse:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'msg'=>$msg,
            'reponses'=>$reponses,
        ));
    }

    /**
     * Finds and displays a Reponse entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Reponse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reponse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Reponse:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Reponse entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Reponse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reponse entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Reponse:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Reponse entity.
    *
    * @param Reponse $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Reponse $entity)
    {
        $form = $this->createForm(new ReponseType(), $entity, array(
            'action' => $this->generateUrl('reponse_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Reponse entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Reponse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reponse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('reponse_edit', array('id' => $id)));
        }

        return $this->render('UtilisateurBundle:Reponse:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Reponse entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UtilisateurBundle:Reponse')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Reponse entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('reponse'));
    }

    /**
     * Creates a form to delete a Reponse entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reponse_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

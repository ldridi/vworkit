<?php

namespace Utilisateur\UtilisateurBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Utilisateur\UtilisateurBundle\Entity\Portfolio;
use Utilisateur\UtilisateurBundle\Form\PortfolioType;

/**
 * Portfolio controller.
 *
 */
class PortfolioController extends Controller
{

    /**
     * Lists all Portfolio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UtilisateurBundle:Portfolio')->findAll();

        return $this->render('UtilisateurBundle:Portfolio:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function listerAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id = $this->container->get('security.context')->getToken()->getUser()->getId();
        $entities = $em->getRepository('UtilisateurBundle:Portfolio')->byUser($id);
        $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);
        return $this->render('UtilisateurBundle:Portfolio:liste.html.twig', array(
            'entities' => $entities,
            'entity'=>$entity,
        ));
    }
    /**
     * Creates a new Portfolio entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Portfolio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $user=$this->container->get('security.context')->getToken()->getUser();
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setUser($user);
            $entity->setDateAjoutPortfolio(new \DateTime());
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice','Votre portfolio a ete mise a jour avec succe');
            return $this->redirect($this->generateUrl('portfolio_new', array('id' => $entity->getId())));
        }

        return $this->render('UtilisateurBundle:Portfolio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Portfolio entity.
     *
     * @param Portfolio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Portfolio $entity)
    {
        $form = $this->createForm(new PortfolioType(), $entity, array(
            'action' => $this->generateUrl('portfolio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Mette à jour les données','attr'=>array('class'=>'btn btn-primary btn-sm')));

        return $form;
    }

    /**
     * Displays a form to create a new Portfolio entity.
     *
     */
    public function newAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id = $this->container->get('security.context')->getToken()->getUser()->getId();
        $entity = new Portfolio();
        $form   = $this->createCreateForm($entity);
         $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);
        return $this->render('UtilisateurBundle:Portfolio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'entity'=>$entity,
        ));
    }

    /**
     * Finds and displays a Portfolio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Portfolio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Portfolio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Portfolio:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Portfolio entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Portfolio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Portfolio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Portfolio:modifier.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Portfolio entity.
    *
    * @param Portfolio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Portfolio $entity)
    {
        $form = $this->createForm(new PortfolioType(), $entity, array(
            'action' => $this->generateUrl('portfolio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Mette à jour les données','attr'=>array('class'=>'btn btn-primary btn-sm')));

        return $form;
    }
    /**
     * Edits an existing Portfolio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Portfolio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Portfolio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice','Votre portfolio a ete mise a jour avec succe');
            return $this->redirect($this->generateUrl('portfolio_edit', array('id' => $id)));
        }

        return $this->render('UtilisateurBundle:Portfolio:modifier.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Portfolio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UtilisateurBundle:Portfolio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Portfolio entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice','Votre portfolio a ete mise a jour avec succe');
        }

        return $this->redirect($this->generateUrl('portfolio'));
    }

    /**
     * Creates a form to delete a Portfolio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('portfolio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Mette à jour les données','attr'=>array('class'=>'btn btn-primary btn-sm')))
            ->getForm()
        ;
    }
}

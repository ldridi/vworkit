<?php

namespace Utilisateur\UtilisateurBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Utilisateur\UtilisateurBundle\Entity\Utilisateur;
use Utilisateur\UtilisateurBundle\Form\UsersType;

/**
 * Users controller.
 *
 */
class UsersAdminController extends Controller
{

    /**
     * Lists all Users entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UtilisateurBundle:Utilisateur')->findAll();

        return $this->render('UtilisateurBundle:Utilisateur:admin/index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Users entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Utilisateur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_users_show', array('id' => $entity->getId())));
        }

        return $this->render('UtilisateurBundle:Utilisateur:admin/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Users entity.
     *
     * @param Users $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Utilisateur $entity)
    {
        $form = $this->createForm(new UsersType(), $entity, array(
            'action' => $this->generateUrl('admin_users_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Users entity.
     *
     */
    public function newAction()
    {
        $entity = new Utilisateur();
        $form   = $this->createCreateForm($entity);

        return $this->render('UtilisateurBundle:Utilisateur:admin/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Users entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $recoms = $em->getRepository('UtilisateurBundle:Recommandation')->ByRecom($id);
        
        $entities = $em->getRepository('UtilisateurBundle:Portfolio')->ByPortfolio($id);
        $educations = $em->getRepository('UtilisateurBundle:Education')->ByEducation($id);
        $emplois = $em->getRepository('UtilisateurBundle:Emploi')->byEmploi($id);
        $plaisirs = $em->getRepository('UtilisateurBundle:Plaisir')->byPlaisir($id);
        $certifs = $em->getRepository('UtilisateurBundle:Certificat')->byCertif($id);
        $langs = $em->getRepository('UtilisateurBundle:Langue')->bylangue($id);
        $projets = $em->getRepository('VworkitBundle:Projet')->byUser($id);
        $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Users entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Utilisateur:admin/show.html.twig', array(
            'entity'      => $entity,
            'entities'=>$entities,
            'educations'=>$educations,
            'emplois'=>$emplois,
            'plaisirs'=>$plaisirs,
            'certifs'=>$certifs,
            'langs'=>$langs,
            'projets'=>$projets,
            'recoms'=>$recoms,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Users entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Users entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Utilisateur:admin/edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Users entity.
    *
    * @param Users $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Utilisateur $entity)
    {
        $form = $this->createForm(new UsersType(), $entity, array(
            'action' => $this->generateUrl('admin_users_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Mettre à jour les données','attr'=>array('class'=>'btn btn-sm btn-primary')));

        return $form;
    }
    /**
     * Edits an existing Users entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Users entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_users_edit', array('id' => $id)));
        }

        return $this->render('UtilisateurBundle:Utilisateur:admin/edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Users entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Users entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_users'));
    }

    /**
     * Creates a form to delete a Users entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_users_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer','attr'=>array('class'=>'btn btn-sm btn-danger')))
            ->getForm()
        ;
    }
}

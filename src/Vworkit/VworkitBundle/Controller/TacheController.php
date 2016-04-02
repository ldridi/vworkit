<?php

namespace Vworkit\VworkitBundle\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Vworkit\VworkitBundle\Entity\Tache;
use Vworkit\VworkitBundle\Form\TacheType;

/**
 * Tache controller.
 *
 */
class TacheController extends Controller
{

    /**
     * Lists all Tache entities.
     *
     */

    public function deletetacheAction($id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);


        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('VworkitBundle:Tache')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tache entity.');
        }

        $em->remove($entity);
        $em->flush();


        return $this->redirect($this->generateUrl('tache'));
    }

    public function MestachesAssocieAction()
    {
        $em = $this->getDoctrine()->getManager();

        //$entities = $em->getRepository('VworkitBundle:Tache')->findAll();
        $user = $this->container->get('security.context')->getToken()->getUser()->getId();
        $tache = $em->getRepository('VworkitBundle:Tache')->RechercheByAssocie($user);
        return $this->render('VworkitBundle:Tache:index.html.twig', array(
            'taches' => $tache,
        ));
    }
    
    public function MestachesAction()
    {
        $em = $this->getDoctrine()->getManager();

        //$entities = $em->getRepository('VworkitBundle:Tache')->findAll();
        $user = $this->container->get('security.context')->getToken()->getUser()->getId();
        $tache = $em->getRepository('VworkitBundle:Tache')->RechercheByMine($user);
        return $this->render('VworkitBundle:Tache:index.html.twig', array(
            'taches' => $tache,
        ));
    }
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        //$entities = $em->getRepository('VworkitBundle:Tache')->findAll();
        $user = $this->container->get('security.context')->getToken()->getUser()->getId();
        $tache = $em->getRepository('VworkitBundle:Tache')->RechercheByUser($user);
        return $this->render('VworkitBundle:Tache:index.html.twig', array(
            'taches' => $tache,
        ));
    }
    /**
     * Creates a new Tache entity.
     *
     */
    public function createAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array('message' => 'You can access this only using Ajax!'), 400);
        }
        $entity = new Tache();
        $entity->setDateAjoutTache(new \DateTime());
        
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
                'form' => $this->renderView('VworkitBundle:Tache:form.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ))), 400);

        return $response;
    }

    /**
     * Creates a form to create a Tache entity.
     *
     * @param Tache $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Tache $entity)
    {
        $form = $this->createForm(new TacheType(), $entity, array(
            'action' => $this->generateUrl('tache_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Déposer le projet','attr'=>array('class'=>'btn btn-primary btn-sm')));

        return $form;
    }

    /**
     * Displays a form to create a new Tache entity.
     *
     */
    public function newAction(Request $request)
    {
        $entity = new Tache();
        $form   = $this->createCreateForm($entity);

        return $this->render('VworkitBundle:Tache:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Tache entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VworkitBundle:Tache')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tache entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VworkitBundle:Tache:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Tache entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VworkitBundle:Tache')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tache entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VworkitBundle:Tache:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Tache entity.
    *
    * @param Tache $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tache $entity)
    {
        $form = $this->createForm(new TacheType(), $entity, array(
            'action' => $this->generateUrl('tache_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tache entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VworkitBundle:Tache')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tache entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tache'));
        }

        return $this->render('VworkitBundle:Tache:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Tache entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VworkitBundle:Tache')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tache entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tache'));
    }

    /**
     * Creates a form to delete a Tache entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tache_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
            ;
    }
}

<?php

namespace Utilisateur\UtilisateurBundle\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Utilisateur\UtilisateurBundle\Entity\Recommandation;
use Utilisateur\UtilisateurBundle\Form\RecommandationType;

/**
 * Recommandation controller.
 *
 */
class RecommandationController extends Controller
{

    /**
     * Lists all Recommandation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UtilisateurBundle:Recommandation')->findAll();

        return $this->render('UtilisateurBundle:Recommandation:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Recommandation entity.
     *
     */
    public function createAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array('message' => 'You can access this only using Ajax!'), 400);
        }
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $foo = $session->get('reco');
        $entity = new Recommandation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $entities = $em->getRepository('UtilisateurBundle:Utilisateur')->find($foo);
        $entity->setTo($entities);
        $entity->setUser($this->container->get('security.context')->getToken()->getUser());
        $entity->setDateAjoutRecommandation(new \DateTime());
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return new JsonResponse(array('message' => 'Success!'), 200);
        }

        $response = new JsonResponse(
            array(
                'message' => 'Error',
                'form' => $this->renderView('UtilisateurBundle:Recommandation:form.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ))), 400);

        return $response;
    }

    /**
     * Creates a form to create a Recommandation entity.
     *
     * @param Recommandation $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Recommandation $entity)
    {
        $form = $this->createForm(new RecommandationType(), $entity, array(
            'action' => $this->generateUrl('recommandation_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Recommander','attr'=>array('class'=>'btn btn-sm btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new Recommandation entity.
     *
     */
    public function newAction(Request $request ,$id)
    {
        
        $entity = new Recommandation();
        $form   = $this->createCreateForm($entity);
        $session = $this->getRequest()->getSession();
        $session->set('reco', $id);
        return $this->render('UtilisateurBundle:Recommandation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            
        ));
    }

    /**
     * Finds and displays a Recommandation entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Recommandation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Recommandation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Recommandation:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Recommandation entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Recommandation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Recommandation entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Recommandation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Recommandation entity.
    *
    * @param Recommandation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Recommandation $entity)
    {
        $form = $this->createForm(new RecommandationType(), $entity, array(
            'action' => $this->generateUrl('recommandation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Recommandation entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Recommandation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Recommandation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('recommandation_edit', array('id' => $id)));
        }

        return $this->render('UtilisateurBundle:Recommandation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Recommandation entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UtilisateurBundle:Recommandation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Recommandation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('recommandation'));
    }

    /**
     * Creates a form to delete a Recommandation entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('recommandation_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

<?php

namespace Vworkit\VworkitBundle\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vworkit\VworkitBundle\Form\CommentaireTacheType;
use Vworkit\VworkitBundle\Entity\CommentaireTache;

/**
 * Projet controller.
 *
 */
class CommentaireTacheController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VworkitBundle:CommentaireTache')->findAll();

        return $this->render('VworkitBundle:CommentaireTache:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function createAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array('message' => 'You can access this only using Ajax!'), 400);
        }
        $entity = new CommentaireTache();
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
                'form' => $this->renderView('VworkitBundle:CommentaireTache:form.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ))), 400);

        return $response;
    }

    /**
     * Creates a form to create a Projet entity.
     *
     * @param Projet $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CommentaireTache $entity)
    {
        $form = $this->createForm(new CommentaireTacheType(), $entity, array(
            'action' => $this->generateUrl('commentaire_tache_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Projet entity.
     *
     */
    public function newAction(Request $request)
    {
        $entity = new CommentaireTache();
        $form   = $this->createCreateForm($entity);

        return $this->render('VworkitBundle:CommentaireTache:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VworkitBundle:CommentaireTache')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VworkitBundle:CommentaireTache:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VworkitBundle:CommentaireTache')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Projet entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('commentaire_tache'));
    }

    /**
     * Creates a form to delete a Projet entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commentaire_tache_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer le commentaire','attr'=>array('class'=>'btn btn-danger btn-sm')))
            ->getForm()
        ;
    }


}

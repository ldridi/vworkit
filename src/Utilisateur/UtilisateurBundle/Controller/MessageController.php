<?php

namespace Utilisateur\UtilisateurBundle\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Utilisateur\UtilisateurBundle\Entity\Message;
use Utilisateur\UtilisateurBundle\Form\MessageType;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

/**
 * Message controller.
 *
 */
class MessageController extends Controller
{
    
    

    
    public function listemessageAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id = $this->container->get('security.context')->getToken()->getUser()->getId();
        $messages = $em->getRepository('UtilisateurBundle:Message')->findByUser1($id);
        $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);
        $nb = $em->getRepository('UtilisateurBundle:Message')->getNb($id);
        
        return $this->render('UtilisateurBundle:Default:alllistemessage.html.twig', array('messages'=>$messages,
            'nb'=>$nb,
            'entity'=>$entity
                ));
    }
    
     public function listearchiveAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id = $this->container->get('security.context')->getToken()->getUser()->getId();
        $messages = $em->getRepository('UtilisateurBundle:Message')->findByUser3($id);
        $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);
        $nombreMessage = $em->getRepository('UtilisateurBundle:Message');
        $nb = $nombreMessage->getNb2($id);
        return $this->render('UtilisateurBundle:Default:listearchive.html.twig', array('messages'=>$messages,
            'nb'=>$nb,
            'entity'=>$entity));
    }
    
    public function listeenvoieAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id = $this->container->get('security.context')->getToken()->getUser()->getId();
        $messages = $em->getRepository('UtilisateurBundle:Message')->findByUser2($id);
        $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);
        $nombreMessage = $em->getRepository('UtilisateurBundle:Message');
        $nb = $nombreMessage->getNb1($id);
        return $this->render('UtilisateurBundle:Default:listeenvoie.html.twig', array('messages'=>$messages,
            'nb'=>$nb,
            'entity'=>$entity));
    }
    
    public function deleteAction($id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        $entity = new Message();
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UtilisateurBundle:Message')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find message entity.');
            }
$entity->setActive('1');
            //$em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('listemessage'));
    } 
    
    public function deleteenvoieAction($id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        $entity = new Message();
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UtilisateurBundle:Message')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find message entity.');
            }
            $entity->setActive('1');
            //$em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('listeenvoie'));
    }
    
    public function deletearchiveAction($id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        $entity = new Message();
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UtilisateurBundle:Message')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find message entity.');
            }
            //$entity->setActive('1');
            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('listearchive'));
    }
    public function messageAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id = $this->container->get('security.context')->getToken()->getUser()->getId();
        $messages = $em->getRepository('UtilisateurBundle:Message')->findByUser($id);
        $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);
        $nombreMessage = $em->getRepository('UtilisateurBundle:Message');
        $nb = $nombreMessage->getNb($id);
        return $this->render('UtilisateurBundle:Default:listemessage.html.twig', array('messages'=>$messages,
            'nb'=>$nb,
            'entity'=>$entity));
       
    }
    
    /**
     * Lists all Message entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UtilisateurBundle:Message')->findAll();

        return $this->render('UtilisateurBundle:Message:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Message entity.
     *
     */
    public function createAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array('message' => 'You can access this only using Ajax!'), 400);
        }
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $foo = $session->get('msg');
        $entity = new Message();
        $form = $this->createCreateForm($entity);
        
        
        $entities = $em->getRepository('UtilisateurBundle:Utilisateur')->find($foo);
        $entity->setTo($entities);
        $form->handleRequest($request);
        $entity->setFrom($this->container->get('security.context')->getToken()->getUser());
        $entity->setDateAjoutMessage(new \DateTime());
        $entity->setActive('0');
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $this->get('session')->getFlashBag()->add('msg','Vos informations ont ete enregistré avec succe');
            $em->persist($entity);
            $em->flush();

            return new JsonResponse(array('message' => 'Success!'), 200);
        }

        $response = new JsonResponse(
            array(
                'message' => 'Error',
                'form' => $this->renderView('UtilisateurBundle:Message:form.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ))), 400);

        return $response;
    }

    /**
     * Creates a form to create a Message entity.
     *
     * @param Message $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Message $entity)
    {
        $form = $this->createForm(new MessageType(), $entity, array(
            'action' => $this->generateUrl('message_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Envoyer','attr'=>array('class'=>'btn btn-sm btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new Message entity.
     *
     */
    public function newAction(Request $request,$id)
    {
        $session = $this->getRequest()->getSession();
        $session->set('msg', $id);
        $entity = new Message();
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);
        
        $form   = $this->createCreateForm($entity);
        
        return $this->render('UtilisateurBundle:Message:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'entities'=>$entities,
        ));
    }

    /**
     * Finds and displays a Message entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Message')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Message entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Message:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Message entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Message')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Message entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateurBundle:Message:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Message entity.
    *
    * @param Message $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Message $entity)
    {
        $form = $this->createForm(new MessageType(), $entity, array(
            'action' => $this->generateUrl('message_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Message entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateurBundle:Message')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Message entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('message_edit', array('id' => $id)));
        }

        return $this->render('UtilisateurBundle:Message:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    

}

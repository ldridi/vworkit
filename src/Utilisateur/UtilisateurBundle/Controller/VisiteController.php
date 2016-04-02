<?php

namespace Utilisateur\UtilisateurBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Utilisateur\UtilisateurBundle\Entity\Visite;


class VisiteController extends Controller
{
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $useractuel= $this->container->get('security.context')->getToken()->getUser();
        $findEntities = $em->getRepository('UtilisateurBundle:Visite')->findUser($useractuel);
        $entities = $this->get('knp_paginator')->paginate($findEntities,$this->get('request')->query->get('page', 1), 10);
        return $this->render('UtilisateurBundle:Visite:index.html.twig', array(
            'entities' => $entities,
           
        ));
    }

    public function deleteVisiteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $findEntities = $em->getRepository('UtilisateurBundle:Visite')->find($id);
        
        $em->remove($findEntities);
        $em->flush();
        return $this->redirect($this->generateUrl('visite'));
    }

    

    
   
    
    

    /**
     * Creates a form to delete a Projet entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    /*private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('historique_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer le projet','attr'=>array('class'=>'btn btn-primary btn-sm pull-right')))
            ->getForm()
        ;
    }*/
    
}

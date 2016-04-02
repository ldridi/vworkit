<?php

namespace Utilisateur\UtilisateurBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HistoriqueController extends Controller
{
    public function HistoriqueAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id = $this->container->get('security.context')->getToken()->getUser()->getId();
        $historique = $em->getRepository('UtilisateurBundle:Historique')->byUser($id);

        return $this->render('UtilisateurBundle:Default:historique.html.twig', array(
            'historiques' => $historique,
        ));
    }

    public function AllhistoriqueAction()
    {
        
        $em = $this->getDoctrine()->getManager();
        
        $id = $this->container->get('security.context')->getToken()->getUser()->getId();
        $finhistorique = $em->getRepository('UtilisateurBundle:Historique')->byhisto($id);
        $historique = $this->get('knp_paginator')->paginate($finhistorique,$this->get('request')->query->get('page', 1), 10);
        return $this->render('UtilisateurBundle:Default:voir_historique.html.twig', array(
            'historiques' => $historique,
        ));
    }
    
    public function deleteAction($id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UtilisateurBundle:Historique')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Historique entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('historique_show'));
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

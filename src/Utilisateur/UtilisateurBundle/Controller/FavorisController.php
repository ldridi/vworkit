<?php

namespace Utilisateur\UtilisateurBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Utilisateur\UtilisateurBundle\Entity\Favoris;


class FavorisController extends Controller
{
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $useractuel= $this->container->get('security.context')->getToken()->getUser();
        $findEntities = $em->getRepository('UtilisateurBundle:Favoris')->findUser($useractuel);
        $entities = $this->get('knp_paginator')->paginate($findEntities,$this->get('request')->query->get('page', 1), 10);
        return $this->render('UtilisateurBundle:Favoris:index.html.twig', array(
            'entities' => $entities,
           
        ));
    }

    public function deleteFavorisAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $findEntities = $em->getRepository('UtilisateurBundle:Favoris')->find($id);
        
        $em->remove($findEntities);
        $em->flush();
        return $this->redirect($this->generateUrl('favoris'));
    }

    public function addFavorisAction($id){
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);
        $findEntities = $em->getRepository('UtilisateurBundle:Utilisateur')->findAll();
        $entities = $this->get('knp_paginator')->paginate($findEntities,$this->get('request')->query->get('page', 1), 10);
        //if ($securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
            $favoris = new Favoris();
            $favoris->setFrom($user);
            $favoris->setTo($entity);
            
            $favoris->setDateajoutfavoris(new \DateTime());
            $em->persist($favoris);
            $em->flush();
            return $this->redirect( $this->generateUrl('favoris', array('entities' => $entities)) );
        
        //}
    }

    public function carouselAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VworkitBundle:projet')->findAll();

        return $this->render('UtilisateurBundle:Favoris:carousel.html.twig',array('entities'=>$entities));
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

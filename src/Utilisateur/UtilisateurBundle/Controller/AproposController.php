<?php

namespace Utilisateur\UtilisateurBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AproposController extends Controller
{
    public function aproposAction()
    {
        $em = $this->getDoctrine()->getManager();
        $id= $this->container->get('security.context')->getToken()->getUser()->getId();
        $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);
        return $this->render('UtilisateurBundle:Default:apropos.html.twig',array('entity'=>$entity));
    }
}

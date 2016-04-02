<?php

namespace Vworkit\VworkitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class prestataireController extends Controller
{
    public function prestataireAction()
    {
        return $this->render('VworkitBundle:Default:frontend/prestataire/layout/prestataire.html.twig');
    }
    
    public function categorieAction()
    {
        return $this->render('VworkitBundle:Default:frontend/prestataire/layout/categorie.html.twig');
    }
}

<?php

namespace Vworkit\VworkitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AcceuilController extends Controller
{
    public function indexAction()
    {
            $securityContext = $this->container->get('security.context');
        if ($securityContext->isGranted('ROLE_USER')) {
        
          return $this->render('VworkitBundle:Default:frontend/acceuil/layout/index.html.twig');
           
        }else{
            return $this->redirect( $this->generateUrl('fos_user_security_login'));
        }
        
    }
    
    public function pagesAction()
    {
        return $this->render('VworkitBundle:Default:frontend/pages/layout/pages.html.twig');
    }

    public function timelineAction()
    {
        return $this->render('VworkitBundle:Default:frontend/pages/layout/timeline.html.twig');
    }
}

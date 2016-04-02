<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Utilisateur\UtilisateurBundle\Controller;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Utilisateur\UtilisateurBundle\Form\formParamType;


/**
 * Controller managing the user profile
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class paramCompteController extends Controller {

    public function formulaireParamTypeAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
            $em = $this->getDoctrine()->getManager();
        $id= $this->container->get('security.context')->getToken()->getUser()->getId();
        $entity = $em->getRepository('UtilisateurBundle:Utilisateur')->find($id);
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException(
            'This user does not have access to this section.');
        } else {
            
            $form = $this->createForm(new formParamType());
            return $this->render('UtilisateurBundle:Default:parametre.html.twig', array('form' => $form->createView(),'entity'=>$entity));
        }
    }

}

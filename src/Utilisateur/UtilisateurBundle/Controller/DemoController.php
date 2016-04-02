<?php

namespace Utilisateur\UtilisateurBundle\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Utilisateur\UtilisateurBundle\Entity\Demo;
use Utilisateur\UtilisateurBundle\Form\DemoType;

/**
 * Utilisateur controller.
 *
 */
class DemoController extends Controller {

    public function newAction(Request $request) {
        $entity = new Demo();
        $form = $this->createCreateForm($entity);

        return $this->render('UtilisateurBundle:Demo:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView()
                        )
        );
    }

    public function createAction(Request $request) {
        //This is optional. Do not do this check if you want to call the same action using a regular request.
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array('message' => 'You can access this only using Ajax!'), 400);
        }

        $entity = new Demo();
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
            'form' => $this->renderView('UtilisateurBundle:Demo:form.html.twig', array(
                'entity' => $entity,
                'form' => $form->createView(),
            ))), 400);

        return $response;
    }

    private function createCreateForm(Demo $entity) {
        $form = $this->createForm(new DemoType(), $entity, array(
            'action' => $this->generateUrl('demo_create'),
            'method' => 'POST',
        ));

        return $form;
    }

}

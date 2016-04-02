<?php

namespace Vworkit\VworkitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BudgetController extends Controller
{
    public function budgetAction()
    {
        $em = $this->getDoctrine()->getManager();
        $budget = $em->getRepository('VworkitBundle:budget')->findAll();
        
        return $this->render('VworkitBundle:Default:frontend/Budget/layout/budget.html.twig', array('budgets'=>$budget));
    }
    
    
    public function budgetsAction($budget) {
        
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('VworkitBundle:Projet')->byBudget($budget);
        $budget = $em->getRepository('VworkitBundle:Budget')->find($budget);
        if (!$budget) {
            throw $this->createNotFoundException('page not found');
        }
        return $this->render('VworkitBundle:Default:frontend/projet/layout/projet.html.twig', array(
                    'entities' => $entities));
    }
    
}

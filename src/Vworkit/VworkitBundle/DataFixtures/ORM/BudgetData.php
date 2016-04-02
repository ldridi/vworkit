<?php

namespace Vworkit\VworkitBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Vworkit\VworkitBundle\Entity\Budget;

class BudgetData implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $budget = new Budget();
        $budget->setNomBudget('euro');
        $budget->setNomBudget('dinar');
        
        $manager->persist($budget);
        $manager->flush();
    }

}



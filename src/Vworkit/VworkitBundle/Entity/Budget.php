<?php

namespace Vworkit\VworkitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Budget
 *
 * @ORM\Table("Budget")
 * @ORM\Entity(repositoryClass="Vworkit\VworkitBundle\Repository\BudgetRepository")
 */
class Budget
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_budget", type="string", length=100)
     */
    private $nomBudget;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomBudget
     *
     * @param string $nomBudget
     * @return Budget
     */
    public function setNomBudget($nomBudget)
    {
        $this->nomBudget = $nomBudget;
    
        return $this;
    }

    /**
     * Get nomBudget
     *
     * @return string 
     */
    public function getNomBudget()
    {
        return $this->nomBudget;
    }
    public function __toString() {
        return $this->getNomBudget(). ' DNT';
    }
}
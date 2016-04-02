<?php

namespace Vworkit\VworkitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etat
 *
 * @ORM\Table("Etat")
 * @ORM\Entity(repositoryClass="Vworkit\VworkitBundle\Repository\EtatRepository")
 */
class Etat
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
     * @ORM\Column(name="nom_etat", type="string", length=100)
     */
    private $nomEtat;


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
     * Set nomEtat
     *
     * @param string $nomEtat
     * @return Etat
     */
    public function setNomEtat($nomEtat)
    {
        $this->nomEtat = $nomEtat;
    
        return $this;
    }

    /**
     * Get nomEtat
     *
     * @return string 
     */
    public function getNomEtat()
    {
        return $this->nomEtat;
    }

    public function __toString(){
        return $this->getNomEtat();
    }
}

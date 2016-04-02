<?php

namespace Vworkit\VworkitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Progression
 *
 * @ORM\Table("Progression")
 * @ORM\Entity(repositoryClass="Vworkit\VworkitBundle\Repository\ProgressionRepository")
 */
class Progression
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
     * @ORM\Column(name="nom_progression", type="string", length=255)
     */
    private $nomProgression;


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
     * Set nomProgression
     *
     * @param string $nomProgression
     * @return Progression
     */
    public function setNomProgression($nomProgression)
    {
        $this->nomProgression = $nomProgression;
    
        return $this;
    }

    /**
     * Get nomProgression
     *
     * @return string 
     */
    public function getNomProgression()
    {
        return $this->nomProgression;
    }
    
    public function __toString() {
        return $this->getNomProgression();
    }
}

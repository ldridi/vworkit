<?php

namespace Vworkit\VworkitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LabelTache
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vworkit\VworkitBundle\Repository\LabelTacheRepository")
 */
class LabelTache
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
     * @ORM\Column(name="nom_label", type="string", length=255)
     */
    private $nomLabel;


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
     * Set nomLabel
     *
     * @param string $nomLabel
     * @return LabelTache
     */
    public function setNomLabel($nomLabel)
    {
        $this->nomLabel = $nomLabel;
    
        return $this;
    }

    /**
     * Get nomLabel
     *
     * @return string 
     */
    public function getNomLabel()
    {
        return $this->nomLabel;
    }

    public function __toString(){
        return $this->getNomLabel();   
    }
}

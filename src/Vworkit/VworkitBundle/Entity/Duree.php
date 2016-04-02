<?php

namespace Vworkit\VworkitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Duree
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vworkit\VworkitBundle\Repository\DureeRepository")
 */
class Duree
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
     * @ORM\Column(name="type_duree", type="string", length=100)
     */
    private $typeDuree;


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
     * Set typeDuree
     *
     * @param string $typeDuree
     * @return Duree
     */
    public function setTypeDuree($typeDuree)
    {
        $this->typeDuree = $typeDuree;
    
        return $this;
    }

    /**
     * Get typeDuree
     *
     * @return string 
     */
    public function getTypeDuree()
    {
        return $this->typeDuree;
    }
    
    public function __toString() {
        return $this->getTypeDuree();
    }
}

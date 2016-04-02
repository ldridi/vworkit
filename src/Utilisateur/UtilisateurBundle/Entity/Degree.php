<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Degree
 *
 * @ORM\Table("Degree")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\DegreeRepository")
 */
class Degree
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
     * @ORM\Column(name="nom_degree", type="string", length=255)
     */
    private $nomDegree;


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
     * Set nomDegree
     *
     * @param string $nomDegree
     * @return Degree
     */
    public function setNomDegree($nomDegree)
    {
        $this->nomDegree = $nomDegree;
    
        return $this;
    }

    /**
     * Get nomDegree
     *
     * @return string 
     */
    public function getNomDegree()
    {
        return $this->nomDegree;
    }
    
    public function __toString() {
        return $this->getNomDegree();
    }
}
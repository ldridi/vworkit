<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Niveau
 *
 * @ORM\Table("Niveau")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\NiveauRepository")
 */
class Niveau
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
     * @ORM\Column(name="nom_niveau", type="string", length=255)
     */
    private $nomNiveau;


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
     * Set nomNiveau
     *
     * @param string $nomNiveau
     * @return Niveau
     */
    public function setNomNiveau($nomNiveau)
    {
        $this->nomNiveau = $nomNiveau;
    
        return $this;
    }

    /**
     * Get nomNiveau
     *
     * @return string 
     */
    public function getNomNiveau()
    {
        return $this->nomNiveau;
    }
    
    public function __toString() {
        return $this->getNomNiveau();
    }
}